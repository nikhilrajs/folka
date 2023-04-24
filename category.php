<?php get_header(); ?>
<?php global $post; ?>
<section class="app-l-blog__wrap">
    <div class="app-l-cat__section">
        <div class="container">
            <h2 class="h2 text-white text-center">Explore <?php echo single_cat_title('' , true ); ?></h2>
						<div class="text-center mb-5 fs-5 fw-light lh-sm" style="color: #868E96;">
							<?php if(get_field('product_description')) { ?>
								<?php echo get_field('product_description') ?>
							<?php } ?>
						</div>
            <div class="app-l-cat__wrap">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$category = get_queried_object();
					$getCatId = $category->term_id;
					$args = array('post_type'=> 'websites', 'cat' => $getCatId, 'posts_per_page' => 9, 'paged' => $paged,  );

					$wp_query = new WP_Query($args);
                     if (have_posts()) :
					while ( have_posts() ) : the_post(); ?>
                    <div class="app-l-cat__block post-<?php the_ID(); ?>">
                        <div class="app-l-cat__hover">
                            <div class="app-l-cat__feature-img">
                                <a href="<?php the_permalink() ?>">
                                    <?php if ( has_post_thumbnail($post->ID) ) {
                                        $thumb_id = get_post_thumbnail_id();
                                        $thumb_url = wp_get_attachment_image_src($thumb_id,'category', true);
                                    ?>
                                        <img data-src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" class="">
                                    <?php

                                    } else { ?>

                                    <img data-src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" class="">

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
                    <input type="hidden" class="d-none" value="<?php echo $getCatId; ?>" id="cat-id" />
                    <?php else : ?>
                        <div class="app-l-no-search d-flex flex-column w-100">
                            <div class="app-l-no-search__image">
                                <img src="<?php echo get_bloginfo('template_directory'); ?>/img/no-search.svg" alt="" class="img-fluid">

                            </div>
                            <div class="app-l-no-search__content">
                                <h3 class="h2">No data on <?php echo single_cat_title('' , true ); ?></h3>
                                <span class="app-l-no-search__tag"> - try a different keyword -</span>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>

            <?php
                $count = get_category($category->term_id)->category_count;
                    if (  $count > 6 ) : ?>
                <div class="app-l-cat__more text-center">
                    <button class="app-c-btn app-c-btn--secondary">load more blogs</button>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
