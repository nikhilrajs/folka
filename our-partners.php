<div class="app-l-our-partners__wrapper">
	<div class="container ">
		<h2 class="app-l-our-partners__title">Our Partners</h2>

		<section class="app-l-our-partners">
			<?php
				$args = array(
							'post_type'      => 'OurPartners',
							'orderby'        => 'post_date',
							'post_status'    => 'publish',
							'order'          => 'DESC',
							'posts_per_page' => -1 // this will retrieve all the post that is published
					);
					$result = new WP_Query( $args );
					if ( $result-> have_posts() ) : ?>
					<?php while ( $result->have_posts() ) : $result->the_post(); ?>
							<div class="app-l-our-partners">
									<?php if( get_field('partnerImage') ): ?>
								<img src="<?php echo get_field('partnerImage') ?>" class="app-l-our-partners__image">
								<?php endif; ?>
							</div>
					<?php endwhile; ?>
			<?php endif; wp_reset_postdata(); ?>
		</section>
	</div>
</div>