<!DOCTYPE html>
<html lang="<?= locale() ?>">
    <head>
        <base href="/"/>
        <meta charset="UTF-8"/>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta http-equiv="Content-Language" content="<?= locale() ?>"/>
        <title><?= text('app_name') ?></title>
        <meta name="description" content="<?= text('home_description') ?>"/>
        <link rel="stylesheet" href="<?= style('app') ?>"/>
        <link rel="stylesheet" href="<?= style('home') ?>"/>
    </head>
    <body>
        <main>
            <h1><?= text('app_name') ?></h1>
            <p><?= ucfirst(text('welcome_to', text('app_name'))) ?></p>
        </main>
    </body>
</html>