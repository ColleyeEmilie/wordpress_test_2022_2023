<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= get_bloginfo('name'); ?></title>
</head>
<body>
    <header class="header">
        <h1 class="header__sitename"><?= get_bloginfo('name'); ?></h1>
        <p class="header__tagline"><?= get_bloginfo('description'); ?></p>
    </header>

    <nav class="nav">
        <?php foreach(hepl_get_menu('main') as $link):?>
            <a href="<?= $link->href; ?>" class="nav__link">
                <span class="nav__label"><?= $link->label; ?></span>
            </a>
        <?php endforeach;?>
    </nav>

    <div class="socialmedia">
    <?php foreach(hepl_get_menu('social-media',['icon']) as $network):?>
        <a href="<?= $network->href?>" class="socialmedia__network socialmedia__network--icon"><?= $network->label;?></a>
    <?php endforeach;?>
    </div>