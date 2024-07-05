<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp-ouie
 */
$flogo = carbon_get_theme_option('footer_image');
$footerbg = carbon_get_theme_option('footer_bg');

$socialmedia = carbon_get_theme_option('quicklink');
$ctabg = carbon_get_theme_option('cta_image_bg');
?>

<footer class="footer-area" style="background-image: url(<?php echo wp_get_attachment_url($footerbg); ?>)">
    <!-- Footer top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-60">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo wp_get_attachment_url($flogo); ?>" alt="Footer Logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">
                            <?php echo carbon_get_theme_option('footer_nav'); ?>
                        </h4>
                        <!-- Footer social media -->
                        <ul class="footer-social-media-link">
                            <?php
                            foreach ($socialmedia as $item) {
                                ?>
                                <li>
                                    <a href=" <?php echo $item['btn_url']; ?>">
                                        <span><?php echo $item['btnsvg']; ?></span>  <span><?php echo $item['btn_title']; ?></span> 
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- Footer social media -->
                    </div>
                </div>
                <div class="col-lg-5 col-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title dark-5 fw-bold">
                            <?php echo carbon_get_theme_option('footer_cta'); ?>
                        </h4>
                        <div class="footer-menu-wrapper">
                            <div class="menu-item">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'menu-2',
                                    'container' => 'ul',
                                    'container_class' => '',
                                    'menu_class' => 'footer-navigation-menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Customizing the output format for better filter handling                                   
                                ));
                                ?>
                            </div>
                            <div class="menu-item menu-item-2nd">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'menu-3',
                                    'container' => 'ul',
                                    'container_class' => '',
                                    'menu_class' => 'footer-navigation-menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Customizing the output format for better filter handling                                   
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title dark-5 fw-bold">
                            <?php echo carbon_get_theme_option('footer_nav'); ?>
                        </h4>
                        <!-- Footer address -->
                        <ul class="footer-address">
                            <li>
                                <a href="tel:<?php echo carbon_get_theme_option('crb_phone_number'); ?>">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.05" width="50" height="50" rx="25" fill="white" fill-opacity="0.7"/>
                                    <path d="M17.8691 19.6621L19.9492 17.584C20.2031 17.3301 20.543 17.1875 20.9023 17.1875C21.2617 17.1875 21.6016 17.3281 21.8555 17.584L24.0957 19.8203C24.3496 20.0742 24.4922 20.416 24.4922 20.7754C24.4922 21.1367 24.3516 21.4746 24.0957 21.7305L22.3457 23.4824C22.7444 24.4113 23.3172 25.2553 24.0332 25.9687C24.75 26.6895 25.5879 27.2578 26.5176 27.6602L28.2676 25.9082C28.5215 25.6543 28.8613 25.5117 29.2207 25.5117C29.398 25.5111 29.5736 25.5458 29.7372 25.6139C29.9009 25.682 30.0493 25.782 30.1738 25.9082L32.416 28.1445C32.6699 28.3984 32.8125 28.7402 32.8125 29.0996C32.8125 29.4609 32.6719 29.7988 32.416 30.0547L30.3379 32.1328C29.9043 32.5664 29.3066 32.8145 28.6934 32.8145C28.5664 32.8145 28.4434 32.8047 28.3184 32.7832C25.7324 32.3574 23.166 30.9805 21.0938 28.9102C19.0234 26.8359 17.6484 24.2695 17.2188 21.6816C17.0957 20.9473 17.3418 20.1914 17.8691 19.6621ZM18.6035 21.4492C18.9844 23.752 20.2227 26.0488 22.0879 27.9141C23.9531 29.7793 26.248 31.0176 28.5508 31.3984C28.8398 31.4473 29.1367 31.3496 29.3477 31.1406L31.3887 29.0996L29.2246 26.9336L26.8848 29.2773L26.8672 29.2949L26.4453 29.1387C25.1662 28.6684 24.0046 27.9255 23.041 26.9617C22.0775 25.9978 21.3351 24.836 20.8652 23.5566L20.709 23.1348L23.0684 20.7773L20.9043 18.6113L18.8633 20.6523C18.6523 20.8633 18.5547 21.1602 18.6035 21.4492Z" fill="white"/>
                                    </svg>
                                    <div class="ctwrap">
                                        <span>Téléphone</span>
                                        <?php echo carbon_get_theme_option('crb_phone_number'); ?>
                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="mailto:<?php echo carbon_get_theme_option('crb_email'); ?>">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.05" width="50" height="50" rx="25" fill="white" fill-opacity="0.7"/>
                                    <path d="M33.125 18.125H16.875C16.5293 18.125 16.25 18.4043 16.25 18.75V31.25C16.25 31.5957 16.5293 31.875 16.875 31.875H33.125C33.4707 31.875 33.75 31.5957 33.75 31.25V18.75C33.75 18.4043 33.4707 18.125 33.125 18.125ZM32.3438 20.2891V30.4688H17.6562V20.2891L17.1172 19.8691L17.8848 18.8828L18.7207 19.5332H31.2812L32.1172 18.8828L32.8848 19.8691L32.3438 20.2891ZM31.2812 19.5312L25 24.4141L18.7188 19.5312L17.8828 18.8809L17.1152 19.8672L17.6543 20.2871L24.3262 25.4746C24.518 25.6237 24.7541 25.7046 24.9971 25.7046C25.24 25.7046 25.4761 25.6237 25.668 25.4746L32.3438 20.2891L32.8828 19.8691L32.1152 18.8828L31.2812 19.5312Z" fill="white"/>
                                    </svg>
                                    <div class="ctwrap">
                                        <span>Adresse email</span>
                                        <?php echo carbon_get_theme_option('crb_email'); ?>
                                    </div>

                                </a>
                            </li>
                        </ul>
                        <!-- Footer address -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer top -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <?php echo carbon_get_theme_option('footer_copyright'); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
</footer>



<?php wp_footer(); ?>

</body>
</html>
