<?php
/*
Template Name: Website Single
Template Post Type: websites
*/
?>


<?php get_header(); ?>
<?php global $post; ?>
<section class="app-l-blog__wrap">
    <div class="app-l-cat__banner">
        <div class="app-l-cat__bn-init">
            <?php while(have_rows('gallery')) : the_row();
                $galleryImage = get_sub_field('upload_image');
                $galleryLink = get_sub_field('link');
                $bannerCheck = get_sub_field('add_to_banner');
            ?>
                <?php if( $bannerCheck ):  ?>
                    <div class="app-l-cat__bn-item" style="background-image:url('<?php echo $galleryImage ?>');">
                        <img src="<?php echo $galleryImage ?>" class="img-fluid">
                    </div>
                <?php endif; ?>
            <?php endwhile;?>
        </div>
    </div>
    <div class="app-l-cat__entry bg-white pt-0">
        <div class="container">

            <div class="app-l-cat__card">
                <div class="app-l-cat__c-top">
                    <div class="app-l-cat__ct-l">
                        <?php if( get_field('night') ): ?>
                        <span class="app-l-cat__tag"><?php echo the_field('tagline') ?></span>
                        <?php endif; ?>
                        <h2 class="app-l-cat_title"><?php echo the_title(); ?></h2>
                    </div>
                    <div class="app-l-cat__ct-r">
                        <div class="app-l-cat__ddn">
                            <?php if( get_field('day') ): ?>
                            <div class="app-l-cat__ddns">
                                <i class="folka-day"></i>
                                <div class="app-l-cat__d-num"><span><?php echo the_field('day') ?></span> days</div>
                            </div>
                            <?php endif; ?>
                            <?php if( get_field('night') ): ?>
                            <div class="app-l-cat__ddns">
                                <i class="folka-night"></i>
                                <div class="app-l-cat__d-num"><span><?php echo the_field('night') ?></span> night</div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <?php if(have_rows('day_location')) :?>
                        <div class="app-l-cat__locations">
                            <i class="folka-location"></i>
                            <div class="app-l-cat__lc-d">
                                <?php while(have_rows('day_location')) : the_row();
                                    $locName = get_sub_field('place');
                                ?>
                                <span><?php echo $locName; ?></span>
                                <?php endwhile;?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="app-l-cat__c-bottom">
                    <?php if( get_field('price') ): ?>
                        <div class="app-l-cat__cb-left">
                            <span class="app-l-cat__tagline">Price per person</span>
                            <div class="app-l-cat__price">
                                <i class="folka-rupee"></i>
                                <span class="app-l-cat__amount"><?php echo the_field('price') ?></span>
                                <span class="app-l-cat__am-tg">onwards</span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="app-l-cat__cb-right">
                        <a href="javascript:void(0);" class="app-c-btn app-c-btn--grey" data-fancybox="dialog"  data-src="#dialog-content">
                            <span>Book Now</span>
                            <i class="folka-date"></i>
                        </a>
                        <?php if( get_field('upload_brochure') ): ?>
                            <a href="<?php echo the_field('upload_brochure') ?>" target="_blank" class="app-c-btn app-c-btn--primary" download>
                                <span>View Brochure</span>
                                <i class="folka-file"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="app-l-cat__sub-pos">
                    <div class="container">
                        <div class="app-l-cat__sub-links">
                            <ul>
                                <?php if( get_field('itinerary_over_view') ): ?>
                                    <li><a href="#itinerary_over_view">Itinerary over view</a></li>
                                <?php endif; ?>
                                <?php if( get_field('carbon_foot_print') ): ?>
                                    <li><a href="#carbon_foot_print">Carbon foot print</a></li>
                                <?php endif; ?>
                                <?php if( get_field('impact') ): ?>
                                    <li><a href="#impact">Impact</a></li>
                                <?php endif; ?>
                                <?php if( get_field('accessibility') ): ?>
                                    <li><a href="#accessibility">Accessibility</a></li>
                                <?php endif; ?>
                                <?php if( get_field('activities') ): ?>
                                    <li><a href="#activities">Activities</a></li>
                                <?php endif; ?>
                                <?php if( get_field('things_to_take_care') ): ?>
                                    <li><a href="#things_to_take_care">Things to carry</a></li>
                                <?php endif; ?>
                                <?php if( get_field('how_to_reach') ): ?>
                                    <li><a href="#how_to_reach">How to reach</a></li>
                                <?php endif; ?>
                                <?php if( get_field('faq') ): ?>
                                    <li><a href="#faq">FAQ</a></li>
                                <?php endif; ?>
                                <?php if( get_field('cancellation_policy') ): ?>
                                    <li><a href="#cancellation_policy">Cancellation policy</a></li>
                                <?php endif; ?>
                                <?php if(have_rows('gallery')) :?>
                                    <li><a href="#gallery">Gallery</a></li>
                                <?php endif; ?>
                                <?php if(have_rows('user_review')) :?>
                                    <li><a href="#review">Reviews</a></li>
                                <?php endif; ?>
                                <?php if(have_rows('covid_protocol_list')) :?>
                                    <li><a href="#covid_protocol">Covid Protocol</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-l-cat__data-wrap" id="itinerary_over_view">
                <?php if( get_field('itinerary_over_view') ): ?>
                <div class="app-l-cat__data-block">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Itinerary over view</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <?php echo the_field('itinerary_over_view') ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('carbon_foot_print') ): ?>
                <div class="app-l-cat__data-block" id="carbon_foot_print">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl"></div>
                        <div class="app-l-cat__fr">
                            <div class="app-l-cat__fr-icon">
                                <img src="<?php echo get_bloginfo('template_directory'); ?>/img/co2.svg" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Carbon foot print calculation & suggestions to reduce it</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <?php echo the_field('carbon_foot_print') ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('impact') ): ?>
                <div class="app-l-cat__data-block" id="impact">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Impact</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <?php echo the_field('impact') ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('accessibility') ): ?>
                <div class="app-l-cat__data-block" id="accessibility">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Accessibility</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <?php echo the_field('accessibility') ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('activities') ): ?>
                <div class="app-l-cat__data-block" id="activities">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Activities</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <ul class="app-l-number-list">
                                <?php while(have_rows('activities')) : the_row();
                                    $activityText = get_sub_field('activities_item');
                                ?>
                                    <li><?php echo $activityText ?></li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('things_to_take_care') ): ?>
                <div class="app-l-cat__data-block" id="things_to_take_care">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Things to take care/carry with you</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <ul class="app-l-number-list">
                                <?php while(have_rows('things_to_take_care')) : the_row();
                                    $thinsToCareText = get_sub_field('things_item');
                                ?>
                                    <li><?php echo $thinsToCareText ?></li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('how_to_reach') ): ?>
                <div class="app-l-cat__data-block" id="how_to_reach">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">How to reach</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <ul class="app-l-list-icon">
                                <?php while(have_rows('how_to_reach')) : the_row();
                                    $howtoText = get_sub_field('how_to_reach_text');
                                    $mode = get_sub_field('mode');
                                ?>
                                    <li>
                                        <?php if($mode == 'flight') :?>
                                            <i class="folka-flight"></i>
                                        <?php elseif($mode == 'train') : ?>
                                            <i class="folka-train"></i>
                                        <?php elseif($mode == 'bus') : ?>
                                            <i class="folka-bus"></i>
                                        <?php elseif($mode == 'car') : ?>
                                            <i class="folka-car"></i>
                                        <?php endif; ?>
                                        <span><?php echo $howtoText ?></span>
                                    </li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('faq') ): ?>
                <div class="app-l-cat__data-block" id="faq">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">FAQ</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <ul type="1" class="app-l-number-list-strong">
                                <?php while(have_rows('faq')) : the_row();
                                    $faqHeading = get_sub_field('heading');
                                    $faqDescription = get_sub_field('description');
                                ?>
                                    <li>
                                        <span class="app-l-nm__str"><?php echo $faqHeading ?></span>
                                        <?php echo $faqDescription ?>
                                    </li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( get_field('cancellation_policy') ): ?>
                <div class="app-l-cat__data-block" id="cancellation_policy">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Cancellation Policy</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <?php echo the_field('cancellation_policy') ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(have_rows('gallery')) :?>
                    <div class="app-l-cat__data-block" id="gallery">
                        <div class="app-l-cat__smhead">
                            <div class="app-l-cat__smhl">
                                <h3 class="h4">Gallery</h3>
                            </div>
                            <div class="app-l-cat__smhr">
                                <button class="app-l-cat__left app-l-cat__gl">
                                    <i class="folka-arrow-left"></i>
                                </button>
                                <button class="app-l-cat__right app-l-cat__gr">
                                    <i class="folka-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="app-l-cat__g-init">
                            <div class="app-l-cat__g-wrap lightSlider">
                                <?php while(have_rows('gallery')) : the_row();
                                    $galleryImage = get_sub_field('upload_image');
                                ?>
                                <div class="app-l-cat__g-item">
                                    <a href="<?php echo $galleryImage ?>" data-fancybox="gallery">
                                        <img src="<?php echo $galleryImage ?>" class="d-block">
                                    </a>
                                </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php if(have_rows('user_review')) :?>
                <div class="app-l-cat__data-block" id="review">
                    <div class="app-l-cat__smhead">
                        <div class="app-l-cat__smhl">
                            <h3 class="h4">Reviews</h3>
                        </div>
                        <div class="app-l-cat__smhr">
                            <button class="app-l-cat__left app-l-cat__rl">
                                <i class="folka-arrow-left"></i>
                            </button>
                            <button class="app-l-cat__right app-l-cat__rr">
                                <i class="folka-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="app-l-cat__review-sl">
                        <div class="app-l-cat__review-init">
                            <?php while(have_rows('user_review')) : the_row();
                                $reviewName = get_sub_field('name');
                                $reviewImage = get_sub_field('image');
                                $reviewDes = get_sub_field('description');
                                $reviewRole = get_sub_field('role');
                            ?>
                            <div class="app-l-cat__review-item">
                                <div class="app-l-cat__review-cnt">
                                    <p><?php echo $reviewDes; ?>
                                    </p>
                                </div>
                                <div class="app-l-cat__r-user">
                                    <?php if( get_sub_field('image') ): ?>
                                        <div class="app-l-cat__r-avatar">
                                            <img src="<?php echo $reviewImage; ?>" alt="<?php echo $reviewName; ?>" class="img-fluid">
                                        </div>
                                    <?php endif; ?>
                                    <div class="app-l-cat__r-data">
                                        <?php if( get_sub_field('name') ): ?>
                                            <h6><?php echo $reviewName; ?></h6>
                                        <?php endif; ?>
                                        <?php if( get_sub_field('role') ): ?>
                                            <span class="app-l-cat__r-role"><?php echo $reviewRole; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile;?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(have_rows('covid_protocol_list')) :?>
                <div class="app-l-cat__data-block" id="covid_protocol">
                    <div class="app-l-cat__data-f">
                        <div class="app-l-cat__fl">
                            <h3 class="h4">Covid Protocol</h3>
                        </div>
                        <div class="app-l-cat__fr">
                            <div class="app-l-cat__covid-ptrl">
                                <div class="app-l-cat__covid__pl">
                                    <ul class="app-l-number-list">
                                        <?php while(have_rows('covid_protocol_list')) : the_row();
                                            $covidText = get_sub_field('enter_covid_protocol_text');
                                        ?>
                                            <li><?php echo $covidText ?></li>
                                        <?php endwhile;?>
                                    </ul>
                                </div>
                                <?php if( get_field('upload_safa_travel_logo') ): ?>
                                    <div class="app-l-cat__covid__pr">
                                        <img src="<?php echo the_field('upload_safa_travel_logo') ?>" class="img-fluid">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="app-l-recent-stories app-l-bg--dark">
    <div class="container">
        <h2 class="h1">explore more</h2>
        <div class="app-l-recent__slider-wrap">
            <div class="app-l-r__slider-over">
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $category = get_the_category();
                    $getCatId = $category[0]->cat_ID;
                    $args = array(
                        'post_type'=> 'websites',
                        'cat' => $getCatId,
                        'posts_per_page' => 3,
                        'paged' => $paged,
                        'order' => 'ASC'
                    );

                    $wp_query = new WP_Query($args);
                    while ( have_posts() ) : the_post(); ?>
                    <div class="app-l-cat__block post-<?php the_ID(); ?>">
                        <div class="app-l-cat__hover">
                            <div class="app-l-cat__feature-img">
                                <a href="<?php the_permalink() ?>">
                                    <?php if ( has_post_thumbnail($post->ID) ) {
                                        $thumb_id = get_post_thumbnail_id();
                                        $thumb_url = wp_get_attachment_image_src($thumb_id,'category', true);
                                    ?>
                                        <img data-src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid w-100">
                                    <?php

                                    } else { ?>

                                    <img data-src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" class="img-fluid w-100">

                                    <?php } ?>
                                </a>
                            </div>
                            <div class="app-l-cat__data">
                                <div class="app-l-cat__tp">
                                    <?php if( get_field('night') ): ?>
                                    <span class="app-l-cat__sub-text"><?php echo the_field('tagline') ?></span>
                                    <?php endif; ?>
                                    <h3 class="h5"><a href="<?php the_permalink() ?>"> <?php echo the_title(); ?></a></h3>
                                </div>
                                <div class="app-l-cat__bt">
                                    <div class="app-l-cat__dn">
                                        <?php if( get_field('day') ): ?>
                                            <div class="app-l-cat__dns">
                                                <i class="folka-day"></i>
                                                <div class="app-l-cat__d-num"><span><?php echo the_field('day') ?></span> days</div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( get_field('night') ): ?>
                                            <div class="app-l-cat__dns">
                                                <i class="folka-night"></i>
                                                <div class="app-l-cat__d-num"><span><?php echo the_field('night') ?></span> night</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if( get_field('price') ): ?>
                                        <div class="app-l-cat__price">
                                            <i class="folka-rupee"></i>
                                            <span><?php echo the_field('price') ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;  wp_reset_query();?>
            </div>
            <div class="app-l-r__controls">
                <button class="app-l-r__left">
                    <i class="folka-arrow-left"></i>
                </button>
                <button class="app-l-r__right">
                    <i class="folka-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<div id="dialog-content" class="app-l-booknow">
<div class="app-l-bookn__header">
  <h4>book now!</h4>
  <p>Please enter the below details and we will get back to you
                                    </p>
</div>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("BookNow") ) : ?>

    <?php endif;?>
</div>

<?php get_footer(); ?>







