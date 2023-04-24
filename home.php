<?php /* Template Name: Home Page */ ?>
<?php global $post; ?>
<?php get_header(); ?>
<?php get_template_part( 'sportlight', get_post_format() ); ?>
<?php get_template_part( 'home-products', get_post_format() ); ?>

<!-- <section class="app-l-deliver app-l-bg--dark">
    <div class="container">
        <h2 class="h1">what we deliver...</h2>
        <div class="app-l-deliver__row">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'folka-products',
                    'posts_per_page' => -1,
                    'paged' => $paged,
                    'order'	=> 'ASC'
                );
                $wp_query = new WP_Query($args);
                while ( have_posts() ) : the_post(); ?>
                    <?php $field = get_field_object('shape'); ?>
                    <div class="app-l-deliver__block <?php echo esc_attr($field['value']); ?>">
                        <div class="app-l-deliver__over" style="background-image: url('<?php echo the_field('background_image') ?>');">
                            <div class="app-l-deliver__content">
                                <h3>
                                    <img src="<?php echo get_bloginfo('template_directory'); ?>/img/logo-white.svg" alt="" class="img-fluid app-l-d__logo">
                                    <?php if( get_field('heading_image') ): ?>
                                        <span>
                                            <span><img src="<?php echo the_field('heading_image') ?>" alt="" class="img-fluid"></span>
                                        </span>
                                    <?php endif; ?>
                                </h3>
                                <?php if( get_field('tagline') ): ?>
                                    <div class="app-l-deliver__tag">
                                        <span><?php echo the_field('tagline') ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php  if( '' !== get_post()->post_content ) : ?>
                                    <div class="app-l-deliver__data">
                                        <?php echo the_content(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( get_field('link') ): ?>
                                    <div class="app-l-deliver__btn">
                                        <a href="<?php echo the_field('link') ?>" class="app-c-btn app-c-btn--primary">
                                            <?php echo the_field('link_text') ?>
                                            <i class="folka-arrow-right"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>     -->

<!-- <section class="app-l-folka__mv app-l-bg--dark">
    <div class="container">
        <div class="app-l-folka__mv-block app-l-folka__mission">
            <div class="app-l-folka__mv-row">
                <div class="app-l-folka__mv-left">
                    <?php if( get_field('vission_icon') ): ?>
                        <img src="<?php echo the_field('vission_icon') ?>" class="img-fluid" alt="Folka Mission">
                    <?php endif; ?>
                    <?php if( get_field('vission_heading') ): ?>
                        <span class="app-l-folka__ltext"><?php echo the_field('vission_heading') ?></span>
                    <?php endif; ?>
                </div>
                <div class="app-l-folka__mv-right">
                    <?php if( get_field('mission_content') ): ?>
                        <span class="app-l-folka__rtext">
                            <?php echo the_field('vission_content') ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="app-l-folka__mv-block app-l-folka__vission">
            <div class="app-l-folka__mv-row">
                <div class="app-l-folka__mv-left">
                    <?php if( get_field('mission_icon') ): ?>
                        <img src="<?php echo the_field('mission_icon') ?>" class="img-fluid" alt="Folka Vission">
                    <?php endif; ?>
                    <?php if( get_field('mission_heading') ): ?>
                        <span class="app-l-folka__ltext"><?php echo the_field('mission_heading') ?></span>
                    <?php endif; ?>
                </div>
                <div class="app-l-folka__mv-right">
                    <?php if( get_field('mission_content') ): ?>
                        <span class="app-l-folka__rtext">
                            <?php echo the_field('mission_content') ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="app-l-folka__arrow">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/img/img-arrow.svg" class="img-fluid">
            </div>
        </div>
    </div>
</section> -->
<section class="app-l-how-we-are app-l-bg--dark">
    <div class="container app-l-how-we-are__container">
				<?php if(get_field('home_community_info_title')) { ?>
					<h3 class="fs-4 lh-base mb-4 text-center text-lg-start"><?php echo get_field('home_community_info_title') ?></h3>
				<?php } ?>

        <div class="app-l-hw__row">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'features',
                'posts_per_page' => -1,
                'paged' => $paged,
                'meta_key'=> 'order',
	            'orderby'=> 'meta_value',
                'order'	=> 'ASC'
            );
            $wp_query = new WP_Query($args);
            while ( have_posts() ) : the_post(); ?>
                <div class="app-l-hw__block">
                    <div class="app-l-hw__icon">
                        <img src="<?php echo the_field('feature_icon') ?>" class="img-fluid">
                    </div>
                    <div class="app-l-hw__text">
                        <span class="app-l-hw__label"><?php echo the_title(); ?></span>
                    </div>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
				<div class="app-l-hw__divider"></div>
				<section class="row">
					<div class="col-lg-8">
					<?php if(get_field('home_community_info_description')) { ?>
						<h2 class="fw-light fs-4 lh-base text-center text-lg-start"><?php echo get_field('home_community_info_description') ?></h2>
					<?php } ?>
					<div class="fw-light text-center text-lg-start">
						<?php if(get_field('home_community_info_sub_description')) { ?>
							<?php echo get_field('home_community_info_sub_description') ?>
						<?php } ?>
					</div>
				</div>
						<div class="col-lg-4 d-flex align-items-sm-end justify-content-center justify-content-lg-start justify-content-lg-end mb-3">
							<a href="javascript:void(0);" class="app-c-btn app-c-btn--teritary" data-fancybox="dialog"  data-src="#home_community_info_dialog">
									<span>Join Folka Community</span>
							</a>
						</div>
					</section>
    </div>
</section>

<section class="app-l-projects--v2 app-l-bg--dark">
    <div class="container">

			<div>
				<div class="">
							<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
									'post_type' => 'projects',
									'posts_per_page' => 1,
									'paged' => $paged,
									'order'	=> 'ASC'
							);
							$wp_query = new WP_Query($args);
							while ( have_posts() ) : the_post(); ?>
									<div class="app-l-project__item--v2">
											<div class="app-l-project__image">
													<img class="img-fluid" src="<?php echo the_field('projects_slider_image') ?>" alt="">
											</div>
											<div class="app-l-project__content--v2 d-flex flex-column">
															<h2 class="app-l-project__content--v2__title"><?php echo the_title(); ?></h2>

															<?php if(get_field('home_projects_sub_content')) { ?>
																<div class="app-l-project__content--v2__sub-content"><?php echo get_field('home_projects_sub_content')?></div>
															<?php } ?>

															<div class="app-l-project__content--v2__content"><?php echo the_content() ?></div>

															<?php if(!get_field('hide_button')) { ?>
																	<a href="<?php the_permalink(); ?>" class="app-c-btn app-c-btn--primary align-self-md-start" style="margin-block-start: auto">View full details</a>
															<?php } ?>
											</div>
									</div>
							<?php endwhile; wp_reset_query(); ?>
					</div>
			</div>

			<!-- Old Project Section with Slider - Start -->
				<!-- <div class="app-l-prj__slider-wrap">
					<div class="app-l-project__slider">
							<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
									'post_type' => 'projects',
									'posts_per_page' => -1,
									'paged' => $paged,
									'order'	=> 'ASC'
							);
							$wp_query = new WP_Query($args);
							while ( have_posts() ) : the_post(); ?>
									<div class="app-l-project__item">
											<div class="app-l-project__image">
													<img src="<?php echo the_field('projects_slider_image') ?>" alt="">
											</div>
											<div class="app-l-project__content">
													<div class="app-l-project__tag">
															<span>#</span>Projects
													</div>
													<div class="app-l-project__c-wrap">
															<h2><?php echo the_title(); ?></h2>
															<p>
																	<?php echo the_content() ?>
															</p>
															<?php if(!get_field('hide_button')) { ?>
																	<a href="<?php the_permalink(); ?>" class="app-c-btn app-c-btn--teritary">Read full case study</a>
															<?php } ?>
													</div>
											</div>
									</div>
							<?php endwhile; wp_reset_query(); ?>
					</div>
				</div> -->
			<!-- Old Project Section with Slider - End -->
    </div>
</section>


<div id="home_community_info_dialog" class="app-l-booknow">
	<!-- <div class="app-l-bookn__header">
		</div> -->
		<?php if(get_field('home-join-community-title')) { ?>
			<h4 class="mb-3 mb-md-5">
				<?php echo get_field('home-join-community-title')?>
			</h4>
		<?php } ?>
		<div class="mb-md-5">
			<?php if(get_field('home-join-community-description')) { ?>
				<?php echo get_field('home-join-community-description')?>
			<?php } ?>
		</div>
		<div class="d-flex justify-content-end" style="gap: 1rem">
			<button type="button" class="app-c-btn app-c-btn--grey">Cancel</button>
			<a href="<?php echo the_field('home-join-community-action') ?>" target="_blank" class="app-c-btn app-c-btn--primary">
					<?php echo the_field('home-join-community-action_label') ?>
			</a>
		</div>
</div>

<?php get_template_part( 'recent-stories', get_post_format() ); ?>
<?php get_template_part( 'our-partners', get_post_format() ); ?>
<?php get_template_part( 'partner-with-us', get_post_format() ); ?>
<!-- <?php get_template_part( 'partner-with-us-inside', get_post_format() ); ?> -->
<?php get_footer(); ?>
