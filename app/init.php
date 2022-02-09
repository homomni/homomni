<?php

const DEFAULT_LOCALE = 'fr-CI';

function locale(): string {
    return 'en-US';
}

function lang(string $locale = DEFAULT_LOCALE): string {
    return substr($locale, 0, 2);
}

function values(string $locale): array {
    static $values;
    if (!isset($values[$locale])) {
        $values[$locale] = ($path = pathOf("app.res.values.$locale", '.json')) ? json_decode(file_get_contents($path), true) : [];
    }
    return $values[$locale];
}

function value(string $name, string ...$data): string {
    $values = values(lang(DEFAULT_LOCALE));
    $values = array_merge($values, values(locale(DEFAULT_LOCALE)));
    if (($locale = locale()) !== DEFAULT_LOCALE) {
        $values = array_merge($values, values(lang($locale)));
        $values = array_merge($values, values($locale));
    }
    $value = $values[$name] ?? $name;
    if (!empty($data)) {
        $value = sprintf($value, ...$data);
    }
    return $value;
}

function view (string $name, array $data = []): ?string {
    $view = null;
    if ($path = pathOf("app.res.views.$name", '.php')) {
        extract($data);
        ob_start();
        $view = (string) require $path;
        if (is_numeric($view))
            $view = ob_get_clean();
        else
            ob_end_clean();
    }
    return $view;
}

function pathOf(string $name, string $extension = ''): ?string {
    return file_exists($path = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $name) . $extension) ? $path : null;
}

function send(null|int|string $content = null): void {
    if (!isset($content))
        exit;
    exit($content);
}

function style(string $name): string {
    return url("static.$name", '.css');
}

function script(string $name): string {
    return url("static.$name", '.js');
}

function url(string $name, string $extension): ?string {
    if (!pathOf("render.$name", $extension)) {
        throw new \RuntimeException("Unknown $name ($extension) in " . pathOf('render'));
    }
    return '/' . str_replace('.', '/', $name) . $extension;
}
