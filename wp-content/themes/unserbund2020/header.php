<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&subset=cyrillic" rel="stylesheet">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <link rel="icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page">
        <header id="masthead" class="navbar-static-top" role="banner">
            <nav class="navbar navbar-fixed-top sticky-header" id="main-bot-menu" role="navigation">
                <div class="container">
                    <img class="logo__image" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
                    <div class="logo__info">
                        <h1 class="logo__h1"><?php bloginfo('name'); ?></h1>
                        <h2 class="hidden-xs logo__h2"><?php bloginfo('description'); ?></h2>
                        <span class="hidden-lg hidden-md hidden-sm">+380504785508</span>
                    </div>
                </div>
            </nav>
        </header>
        <!-- #masthead -->
        <div id="main" class="site-main">