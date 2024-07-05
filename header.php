<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp-ouie
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Google font -->
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <header class="sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-6">
                        <div class="logo">
                            <?php
                            if (has_custom_logo()) :
                                the_custom_logo();
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6">
                        <div class="menu-tigger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M2 5C2 4.44772 2.44772 4 3 4H16C16.5523 4 17 4.44772 17 5C17 5.55228 16.5523 6 16 6H3C2.44772 6 2 5.55228 2 5Z" fill="black"/>
                            <path d="M2 12C2 11.4477 2.44772 11 3 11H21C21.5523 11 22 11.4477 22 12C22 12.5523 21.5523 13 21 13H3C2.44772 13 2 12.5523 2 12Z" fill="black"/>
                            <path d="M3 18C2.44772 18 2 18.4477 2 19C2 19.5523 2.44772 20 3 20H11C11.5523 20 12 19.5523 12 19C12 18.4477 11.5523 18 11 18H3Z" fill="black"/>
                            </svg>
                        </div>
                        <nav>
                            <div class="navinner menu-tigger">
                                <span class="mob-close-btn">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.13452 4.92879C5.54133 4.53825 6.20087 4.53827 6.60766 4.92879L19.8659 17.6567C20.2727 18.0472 20.2727 18.6804 19.8659 19.0709C19.4591 19.4615 18.7996 19.4615 18.3928 19.0709L5.13452 6.343C4.72773 5.95248 4.72772 5.31932 5.13452 4.92879Z" fill="black"/>
                                    <path d="M19.865 4.92864C20.2718 5.31917 20.2718 5.95233 19.865 6.34285L6.60674 19.0708C6.19993 19.4613 5.54041 19.4613 5.1336 19.0708C4.72679 18.6802 4.72679 18.0471 5.1336 17.6566L18.3919 4.92864C18.7986 4.53811 19.4582 4.5381 19.865 4.92864Z" fill="black"/>
                                    </svg>
                                </span>
                                
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'menu-1',
                                    'container' => 'ul',
                                    'container_class' => '',
                                    'menu_class' => 'navbar-nav mb-lg-0',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Customizing the output format for better filter handling
                                    'list_item_class' => 'nav-item',
                                    'link_class' => 'nav-link menu-item nav-active',
                                        // 'walker' => new Custom_Walker_Nav_Menu() // Custom walker to add classes
                                ));
                                ?>
                            
                            </div>

                        </nav>

                    </div>

                </div>
            </div>
        </header>


