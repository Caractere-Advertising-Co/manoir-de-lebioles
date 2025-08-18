<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://use.typekit.net/bxe2npk.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Wix+Madefor+Display:wght@400..800&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <script src="<?php echo get_template_directory_uri();?>/assets/dist/main.bundle.js" defer></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/dist/style.bundle.js"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="scrollToTop">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path fill="#ffffff"
                d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
        </svg>
    </div>  

    <?php if(is_front_page()):
        get_template_part( 'templates-parts/section-popup' );
    endif;?>

        <?php get_template_part( 'templates-parts/banner' );?>
    <header>
        <?php get_template_part( 'templates-parts/header-nav' );?>
    </header>

    <?php wp_body_open(); ?>
