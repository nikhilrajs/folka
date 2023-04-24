<?php
     $total = wp_count_posts()->publish;

     if (  $total >= 1 ) : ?>
    <section class="app-l-recent-stories pb-4 app-l-bg--dark">
        <div class="container">
            <h2 class="h1">Check out our products</h2>
            <div class="app-l-recent__slider-wrap">
                <div class="app-l-r__slider-over">
                    <?php
                        $args = array(
                            'post_type'=> 'websites',
                            'orderby'    => 'post_date',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'posts_per_page' => 3 // this will retrive all the post that is published
                        );
                        $result = new WP_Query( $args );
                        if ( $result-> have_posts() ) : ?>
                        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                            <div class="app-l-slider__block">
                                <div class="app-l-slider__item js-slider-item--home-products">
																		<div class="p-0 app-l-cat__block post-<?php the_ID(); ?>">
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
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
                <!-- <div class="app-l-r__controls">
                    <button class="app-l-r__left">
                        <i class="folka-arrow-left"></i>
                    </button>
                    <button class="app-l-r__right">
                        <i class="folka-arrow-right"></i>
                    </button>
                </div> -->
            </div>

        </div>
    </section>
<?php endif ?>

<section class="app-l-bg--dark">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php if(get_field('TravelProductsTitle')) { ?>
					<h2 class="text-light fw-light fs-4 lh-base text-center text-md-start"><?php echo get_field('TravelProductsTitle') ?></h2>
				<?php } ?>
				<div class="text-white-50 text-center text-md-start">
					<?php if(get_field('TravelProductsContent')) { ?>
						<?php echo get_field('TravelProductsContent') ?>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-items-sm-end justify-content-center justify-content-md-start justify-content-lg-end mb-3">
				<?php if(get_field('TravelProductsButtonLink')) { ?>
					<a href="<?php echo get_field('TravelProductsButtonLink') ?>" class="app-c-btn app-c-btn--primary flex-md-shrink-0"><?php echo get_field('TravelProducts_button_label') ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</section>