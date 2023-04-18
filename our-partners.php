<h2>Our Partners</h2>

<section>
	<?php
                        $args = array(
                            'post_type'=> 'OurPartners',
                            'orderby'    => 'post_date',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'posts_per_page' => -1 // this will retrive all the post that is published
                        );
                        $result = new WP_Query( $args );
                        if ( $result-> have_posts() ) : ?>
                        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                            <div class="app-l-slider__block">
                               <?php if( get_field('partnerImage') ): ?>
															<img src="<?php echo get_field('partnerImage') ?>" class="img-fluid">
															<?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
</section>