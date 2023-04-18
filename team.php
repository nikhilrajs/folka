<?php /* Template Name: Team */ ?>
<?php get_header(); ?>
<?php global $post; ?>
<section class="app-l-blog__wrap">
    <div class="container">
        <div class="app-l-team__info">
             <?php if( get_field('team_heading') ): ?>
                <h2 class="text-white h1"><?php echo the_field('team_heading'); ?></h2>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
        <div class="app-l-meet">
            <h3 class="text-white h1">meet us</h3>
            <div class="app-l-meet__row">
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array( 
                        'post_type' => 'team', 
                        'posts_per_page' => -1, 
                        'paged' => $paged,
                        'order'	=> 'ASC',
                        'meta_key'=> 'order',
	                    'orderby'=> 'meta_value'
                    );
                    $wp_query = new WP_Query($args);
                    while ( have_posts() ) : the_post(); ?>
                        <?php $field = get_field_object('shape'); ?>
                        <div class="app-l-meet__block">
                            
                                <div class="app-l-meet__avatar">
                                     <?php if ( get_field('avatar') ) {?>
                                        <img data-src="<?php echo the_field('avatar'); ?>" class="img-fluid" alt="<?php echo the_title(); ?>">
                                    <?php } else { ?>
                                        <img data-src="<?php bloginfo('template_directory'); ?>/img/user-default.png" alt="<?php the_title(); ?>" class="img-fluid" />
                                    <?php } ?> 
                                </div>
                            
                            <div class="app-l-meet__content">
                                <h5 class="text-white"><?php echo the_title(); ?></h5>
                                <?php if( get_field('designation') ): ?>
                                    <span class="app-l-deg"><?php echo the_field('designation'); ?></span>
                                <?php endif; ?>
                                      
                                <div class="app-l-meet__connect">
                                    <?php if( get_field('linkedin') ): ?>
                                        <a href="<?php echo the_field('linkedin'); ?>" target="_blank"><i class="folka-linkedin"></i></a></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
        <div class="app-l-meet__fut" style="background-image: url(<?php echo the_field('TeamImage'); ?>);">
            <div class="app-l-meet__fet-cnt">
                <?php if( get_field('teamTitle') ): ?>
                    <h3 class="text-white"><?php echo the_field('teamTitle'); ?></h3>
                <?php endif; ?>

                <?php if( myprefix_get_theme_option('input_phone') ): ?>  
                    <?php 
                        $value = myprefix_get_theme_option( 'input_phone' );
                    ?>
                        <a href="tel:<?php echo $value; ?>" class="app-c-btn app-c-btn--primary">
                            <span>Call us now</span>
                            <i class="folka-phone"></i>
                        </a>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>