<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/favicons/apple.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>

<header class="header">
    <div class="container">

        <div class="header-top">

            <?php the_custom_logo(); ?>

            <div class="tooltip tooltip-city">
                <div class="tooltip-value"></div>
                <div class="tooltip-list">
                    <div class="tooltip-items">
                        <?php
                            $cities = get_field('cities', 53);
                            foreach ($cities as $index => $city) { ?>
                                <div data-id="<?php echo $index;?>" class="tooltip-item"><?php echo $city['city'];?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php wp_nav_menu(
                [   
                    'theme_location' => 'header-top',
                    'menu' => 'header-top',
                    'container' => 'nav',
                    'menu_class' => 'nav-top',
                ]
            ); ?>

            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart"><span class="header-cart-num"><?php echo count( WC()->cart->get_cart() )?></span></a>

            <a href="tel:<?php the_field('phone', 16)?>" class="phone"><?php the_field('phone', 16)?></a>

            <button class="button button-accent popup-open popup-message">Перезвоните мне</button>

            <button class="mobile-menu__button">
                <span></span><span></span><span></span>
            </button>
        </div>

        <div class="header-nav">
            <?php wp_nav_menu(
                [
                    'theme_location' => 'header-nav',
                    'menu' => 'header-nav',
                    'container' => 'nav',
                    'menu_class' => 'nav',
                ]
            ); ?>
        </div>

    </div>
</header>