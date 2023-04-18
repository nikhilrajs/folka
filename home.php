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
    <div class="container app-l-how-we-are_container">
        <h3 class="h1">how we are <span>doing it</span></h3>
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
				<section>
					<?php if(get_field('home_community_info_title')) { ?>
						<h2><?php echo get_field('home_community_info_title') ?></h2>
					<?php } ?>
					<?php if(get_field('home_community_info_description')) { ?>
						<?php echo get_field('home_community_info_description') ?>
					<?php } ?>

						<a href="javascript:void(0);" class="app-c-btn app-c-btn--primary" data-fancybox="dialog"  data-src="#home_community_info_dialog">
								<span>Join Community</span>
						</a>
					</section>
    </div>
</section>

<section class="app-l-projects app-l-bg--dark">
    <div class="container">
        <div class="app-l-prj__slider-wrap">
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
        </div>
    </div>
</section>


<div id="home_community_info_dialog" class="app-l-booknow">
	<div class="app-l-bookn__header">
		<h4>book now!</h4>
		<p>Please enter the below details and we will get back to you
																			</p>
	</div>
</div>

<?php get_template_part( 'recent-stories', get_post_format() ); ?>
<?php get_template_part( 'our-partners', get_post_format() ); ?>
<?php get_template_part( 'partner-with-us', get_post_format() ); ?>
<?php get_template_part( 'partner-with-us-inside', get_post_format() ); ?>
<?php get_footer(); ?>