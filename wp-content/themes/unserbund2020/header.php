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
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
</head>
<body <?php body_class(); ?>>
    <div id="page">
        <header id="masthead" class="navbar-static-top" role="banner">
            <nav class="navbar navbar-fixed-top sticky-header" id="main-bot-menu" role="navigation">
                <div class="container uns_navbar">
                    <div class="uns_menu">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1"> 
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                        </button>
                    <ul id="menu-mainmenu" class="nav navbar-nav mainmenu">
                    <li id="menu-item-3568" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-3568 active">
                        <a title="Главная" href="/">Главная</a>
                    </li>
                    <li id="menu-item-4068" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4068">
                        <a title="Наш питомник" href="kennel/">Наш питомник</a>
                    </li>
                    <li id="menu-item-3572" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3572 dropdown">
                        <a title="Собаки" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Собаки <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                <li id="menu-item-4086" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4086">
                                    <a title="Самки Ротвейлеров" href="/females/">Самки Ротвейлеров</a>
                                </li>
                                <li id="menu-item-4072" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4072">
                                    <a title="Кобели Ротвейлеров" href="/males/">Кобели Ротвейлеров</a>
                                </li>
                                <li id="menu-item-4085" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4085">
                                    <a title="Юниоры" href="/juniors/">Юниоры</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-4175" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4175">
                            <a title="Продажа" href="rottweilers-for-sale/">Продажа</a>
                        </li>
                    </ul>
                    </div>
                    <div class="logo__info">
                            <h1 class="logo__h1"><?php bloginfo('name'); ?></h1>
                            <h2 class="hidden-xs logo__h2"><?php bloginfo('description'); ?></h2>
                            <span class="hidden-lg hidden-md hidden-sm  logo__h1">+380504785508</span>
                            <img class="uns_logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
                    </div>
                </div>
            </nav>
        </header>
        <!-- #masthead -->
        <div id="main" class="site-main">