<!DOCTYPE html>
<html lang="<?= locale() ?>">
    <head>
        <base href="/"/>
        <meta charset="UTF-8"/>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta http-equiv="Content-Language" content="<?= locale() ?>"/>
        <title><?= value('app_name') ?></title>
        <meta name="description" content="<?= value('home_description') ?>"/>
        <link rel="stylesheet" href="<?= style('app') ?>"/>
        <link rel="stylesheet" href="<?= style('home') ?>"/>
    </head>
    <body>
        <main>
            <h1><?= value('app_name') ?></h1>
            <p><?= ucfirst(value('Welcome_to', value('app_name'))) ?></p>
            <form action="#" method="GET">
                <p>
                    <input class="field" type="email" name="email" placeholder="<?= value('Enter_email') ?>"/>
                    <button class="button" name="action" type="submit" value="continue"><?= value('Continue') ?></button>
                </p>
            </form>
        </main>
    </body>
</html>