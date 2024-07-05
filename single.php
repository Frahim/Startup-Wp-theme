<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wp-ouie
 */
get_header();

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$categories = get_the_category();
?>
<section class="singlepageg section-padding-top" style="background-image: url(<?php echo $featured_img_url; ?>)">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-12  col-12 cont-wrap">
                <!--                <div class="banner-heading">
                                    
                                   <h2 class="mb-3 singlepage-title">
                <?php the_title(); ?>                               
                                    </h2>
                                </div>
                                 Dark section heading 
                                <div class="singlepage-banner-content">
                <?php echo wp_trim_words(get_the_content(), 30, '...'); ?>
                                </div>
                                 Primary Button 
                                <div class="mt-56">
                                    <a href="#" class="explorebtn text-uppercase fs-16 fw-bold text-decoration-none">
                                        Explore More
                                    </a>
                                </div>-->
                <!-- Primary Button -->
            </div>

        </div>
    </div>
</section>

<div class="aurthor-sec d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="post-infowrwpper col-lg-9    col-12">
                <div class="spi-item">
                    <span class="item-title">Posted By</span>
                    <span class="item-aur tags d-flex gap-3 align-items-center text-decoration-none">
                        <span class="avater-img">
                            <?php
                            $avater = get_avatar(get_the_author_meta('ID'));
                            if (!empty($avater)) {
                                echo $avater;
                            } else {
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/authure-img.png" alt="img" class="img-fluid">
                            <?php } ?>
                        </span>
                        <span class="ff-sg-book-20 fs-16 text-clr-secondary aurthor-ame">
                            <?php
                            $auth_id = $post->post_author;
                            echo get_the_author_meta('display_name', $auth_id);
                            ?>
                        </span>
                    </span>
                </div>
                <div class="spi-item">
                    <span class="item-title">Date</span>
                    <span class="item-aur tags d-flex gap-3 align-items-center text-decoration-none">
                        <?php echo get_the_date('d F Y'); ?>
                    </span>
                </div>
                <div class="spi-item">
                    <span class="item-title">Reading Time</span>
                    <span class="item-aur tags d-flex gap-3 align-items-center text-decoration-none ">
                        <?php display_reading_time(); ?>
                    </span>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="blog-content-wrapper py-5 position-relative">
    <div class="container">
        <div class="row py-lg-8 py-md-4 py-2 flex-lg-row flex-column flex-column-reverse">
            <div class="col-12 col-lg-8 ">
                <div class="banner-heading">                    
                    <h2 class="mb-3 singlepage-title">
                        <?php the_title(); ?>                               
                    </h2>
                </div>
                <div class="blog-details-content pe-lg-5">
                    <?php
                    the_content();
                    ?>
                </div>
            </div>
            <div class="col-12  col-lg-4 col-xxl-4 mb-4 mb-lg-0 ">
                <div class="sidebar">
                    <?php get_sidebar(); ?>
                </div>                
            </div>
        </div>
    </div>
</div>




<?php
get_footer();
