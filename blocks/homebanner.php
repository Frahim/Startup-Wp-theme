<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make(__('Home Banner'))
        ->add_tab(__('Content Part'), array(
            Field::make('text', 'bnr_tag', __('Tag Line')),
            Field::make('text', 'bnr_heading', __('Banner Title')),
            Field::make('text', 'bnr_sub_heading', __('Banner Sub Title')),
            Field::make('rich_text', 'bnr_content', __('Banner Content')),
        ))
        ->add_tab(__('Image Part '), array(
            Field::make('image', 'bnr_bg_image', __('Banner Image')),
        ))
        ->add_tab(__('CTA'), array(
            Field::make('text', 'bnr_btn_url', __('Button URL')),
            Field::make('text', 'bnr_cta_txt', __('Bottom Text')),
        ))
        ->add_tab(__('Style'), array(
            Field::make('color', 'bnr_background', 'Background')
            ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),
            Field::make('image', 'bnr_bg', __('Background Image')),
        ))
        ->set_render_callback(function ($fields, $attributes) {
            ?>

            <section class="banner-area" style="background-image:url(<?php echo wp_get_attachment_url($fields['bnr_bg']); ?>)">    
                <div class="blankspace"></div>
                <div class="content-wrap py-140 order-lg-2 order-last">
                    <div class="banner-content-wrap">
                        <p class="sub-heading fadeInUp animated">
                            <span class="qut-icon">
                                <svg width="95" height="96" viewBox="0 0 95 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_13816_15745)">
                                        <ellipse cx="42.5" cy="38" rx="17.5" ry="18" fill="white"/>
                                    </g>
                                    <path d="M44.543 32.6471V43.353L49.1753 38.8236V32.6471H44.543Z" fill="#00A2E1"/>
                                    <path d="M36.8232 32.6471V43.353L41.4556 38.8236V32.6471H36.8232Z" fill="#00A2E1"/>
                                    <defs>
                                        <filter id="filter0_d_13816_15745" x="0" y="0" width="95" height="96" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                            <feOffset dx="5" dy="10"/>
                                            <feGaussianBlur stdDeviation="15"/>
                                            <feComposite in2="hardAlpha" operator="out"/>
                                            <feColorMatrix type="matrix" values="0 0 0 0 0.0588235 0 0 0 0 0.0823529 0 0 0 0 0.0901961 0 0 0 0.08 0"/>
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_13816_15745"/>
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_13816_15745" result="shape"/>
                                        </filter>
                                    </defs>
                                </svg>

                            </span>
                            <?php echo $fields['bnr_tag']; ?>
                        </p>
                        <h1 class="fadeInDown animated banner-title" data-wow-delay="1.0s">
                            <?php echo $fields['bnr_heading']; ?>
                            <span class="bnr_sub_heading"> <?php echo $fields['bnr_sub_heading']; ?></span>
                        </h1>

                        <p class="banner-content  fadeInUp animated" data-wow-delay="1.2s">
                            <?php echo $fields['bnr_content']; ?>                    
                        </p>
                        <!-- Primary Button -->
                        <div class="bannerbtn fadeInLeft animated" data-wow-delay="1.5s">
                            <a href="<?php echo $fields['bnr_btn_url']; ?>" class="contbtn text-decoration-none">
                                <?php echo $fields['bnr_cta_txt']; ?>
                            </a>
                            <span class="bnr_phone_wrap">
                                <span class="bnp-txt fadeInLeft animated animate__delay-2s">Appelez-nous</span>
                                <span class="bnp-svg fadeInLeft animated animate__delay-3s"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M5.7977 3.19594L5.79753 3.1961L3.51026 5.48122C3.51008 5.4814 3.5099 5.48158 3.50973 5.48176C3.04192 5.95164 2.82555 6.6214 2.93375 7.26718L2.93387 7.26791C3.3875 10 4.84427 12.731 7.05684 14.9478C9.27161 17.1603 12.0023 18.6188 14.7314 19.0682L14.7349 19.0687C14.8425 19.0872 14.9494 19.0959 15.0627 19.0959C15.6044 19.0959 16.1348 18.8759 16.5181 18.4925L18.8041 16.2066C18.9923 16.0184 19.0938 15.7737 19.0938 15.5096C19.0938 15.2478 18.9902 14.9987 18.8041 14.8125L16.3381 12.353L16.3381 12.3531L16.3353 12.3502C16.2451 12.2588 16.1375 12.1862 16.0189 12.1369C15.9003 12.0876 15.7731 12.0624 15.6446 12.0629H15.6428C15.3818 12.0629 15.1348 12.1658 14.9481 12.3524C14.9481 12.3524 14.9481 12.3524 14.9481 12.3524C14.948 12.3525 14.9479 12.3525 14.9479 12.3526L13.0231 14.2795L12.7828 14.5201L12.4707 14.385C11.3908 13.9177 10.4163 13.2569 9.5828 12.419C8.75034 11.5893 8.08436 10.6079 7.6208 9.52786L7.4873 9.2168L7.72652 8.97731L9.65152 7.05016L9.65172 7.04996C9.83992 6.86176 9.94141 6.61705 9.94141 6.35293C9.94141 6.09113 9.83789 5.84209 9.65175 5.65593C9.65174 5.65592 9.65173 5.65591 9.65172 5.6559L7.18777 3.19625L7.18611 3.19458C7.00114 3.00819 6.75527 2.90625 6.49258 2.90625C6.23153 2.90625 5.9844 3.00923 5.7977 3.19594ZM16.136 18.1082L16.1343 18.1099C15.7923 18.4487 15.306 18.6124 14.8243 18.5316C12.1749 18.0934 9.55857 16.6745 7.44313 14.559C5.32782 12.4437 3.90904 9.82552 3.47071 7.17658C3.38953 6.69427 3.55341 6.20667 3.89606 5.86402L6.14117 3.61891L6.49489 3.26519L6.84844 3.61907L9.22891 6.00168L9.58229 6.35538L9.2286 6.70878L6.86013 9.07529L6.92063 9.23865L6.9211 9.23993C7.41295 10.5791 8.19012 11.7954 9.19875 12.8044C10.2074 13.8133 11.4234 14.5909 12.7624 15.0833L12.7635 15.0837L12.9267 15.1441L15.2932 12.7737L15.6469 12.4194L16.0008 12.7736L18.3813 15.1562L18.7345 15.5097L18.3811 15.8631L16.136 18.1082Z" fill="#0F1517" stroke="#0F1517"/>
                                    </svg>
                                </span>
                                <a class="bnp-phon text-decoration-none fadeInLeft animated animate__delay-4s" href="tel:<?php echo carbon_get_theme_option('crb_phone_number'); ?>">
                                    <?php echo carbon_get_theme_option('crb_phone_number'); ?>
                                </a>
                            </span>
                        </div>
                        <!-- Primary Button -->
                    </div>
                </div>
                <div class="imagewrap order-lg-last order-first ">
                    <?php if (!empty($fields['bnr_bg_image'])) { ?>
                        <img src="<?php echo wp_get_attachment_url($fields['bnr_bg_image']) ?>" alt="Banner Image" />
                    <?php } else { ?>
                        <div class="wrapper">
                            <div class="image-box-wrap banner-img-animation">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/trunsparent.png" alt="img">
                                    <!-- Inner image layer -->
                                    <div class="first-layer-img banner-img-part">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/Subtract-11.png" alt="img">
                                    </div>
                                    <div class="second-layer-img banner-img-part">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/Subtract-12.png" alt="img">
                                    </div>
                                    <div class="third-layer-img banner-img-part">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/Subtract-22.png" alt="img">
                                    </div>
                                    <div class="fourth-layer-img banner-img-part">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/Subtract-32.png" alt="img">
                                    </div>
                                    <!-- Inner image layer -->
                            </div>
                            <style>
                                img {
                                    max-width: 100%;
                                    margin: 0;
                                    padding: 0;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                }

                                .wrapper {
                                    max-width: 900px;
                                    width: 100%;
                                    margin-inline: auto;
                                    display: grid;
                                    place-items: center;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                }

                                .image-box-wrap {
                                    position: relative;
                                    text-align: center;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    overflow: hidden;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                    z-index: 1;
                                }

                                .image-box-wrap .banner-img-part {
                                    position: absolute;
                                    z-index: 9;
                                    width: 100%;
                                    height: 100%;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    opacity: 0;
                                    animation: scaleIn 1.2s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                }

                                .image-box-wrap .first-layer-img {
                                    animation-delay: 250ms;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                }
                                .image-box-wrap .second-layer-img {
                                    animation-delay: 450ms;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                }
                                .image-box-wrap .third-layer-img {
                                    animation-delay: 650ms;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                }
                                .image-box-wrap .fourth-layer-img {
                                    animation-delay: 850ms;
                                    transition: all 0.5s;
                                    -webkit-transition: all 0.5s;
                                }

                                @keyframes scaleIn {
                                    0% {
                                        transform: translate(-50%, -50%) scale(0.8);
                                        opacity: 0;
                                    }
                                    80% {
                                        transform: translate(-50%, -50%) scale(1.1);
                                        opacity: 1;
                                    }
                                    100% {
                                        transform: translate(-50%, -50%) scale(1);
                                        opacity: 1;
                                    }
                                }

                                .banner-img-animation:hover .banner-img-part img {
                                    transform: scale(1.05);
                                    transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
                                }

                                .banner-img-animation:hover .fourth-layer-img img {
                                    transition-delay: 50ms;
                                }

                                .banner-img-animation:hover .third-layer-img img {
                                    transition-delay: 150ms;
                                }

                                .banner-img-animation:hover .second-layer-img img {
                                    transition-delay: 250ms;
                                }

                                .banner-img-animation:hover .first-layer-img img {
                                    transition-delay: 350ms;
                                }

                                #circle {
                                    background-color: rgb(107, 165, 0);
                                    width: 300px;
                                    height: 300px;
                                    border-radius: 50%;
                                    margin: calc(100svh + 300px) auto;
                                }

                                .multiple-circle {
                                    height: 200px;
                                    width: 200px;
                                    border-radius: 10%;
                                    background-color: rgb(120, 162, 241);
                                    border: 3px solid pink;
                                    transition: all 0.5s ease-in-out;
                                    transform: scale(0.2);
                                    opacity: 0;
                                    margin: 0 auto 20px auto;
                                }

                                .visible {
                                    transform: scale(1);
                                    opacity: 1;
                                }

                            </style>
                        </div>
                    <?php } ?>
                </div>               
            </section>

            <?php
        });
