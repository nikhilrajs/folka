<div class="app-l-blog__list">
    <?php
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        $args = array(
            'post_type'=> 'post',
            'orderby'    => 'post_date',
            'post_status' => 'publish',
            'order'    => 'DESC',
            'posts_per_page' => 6, // this will retrive all the post that is published 
            'paged' => $paged
        );
        $result = new WP_Query( $args );
        
        if ( $result-> have_posts() ) : ?>
        <?php while ( $result->have_posts() ) : $result->the_post();  ?>
            <div class="app-l-blog__list-item" >
                <div class="app-l-blog-item">
                    <div class="app-l-blog__img">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail($post->ID) ) {
                                $thumb_id = get_post_thumbnail_id();
                                $thumb_url = wp_get_attachment_image_src($thumb_id,'post', true);
                            ?>
                                <img data-src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid" />
                            
                            <?php } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" class="img-fluid" />
                            <?php } ?> 
                        </a>
                    </div>
                    <div class="app-l-blog__data">
                        <?php 
                            $tags = get_tags(array(
                                'hide_empty' => false
                            ));
                        ?>

                        <?php $posttags = get_the_tags(); ?>
                        <?php if ( $posttags ) { ?>
                            <div class="app-l-blog__tag">
                                <?php foreach ($posttags as $tag) { ?>
                                    <span><?php echo $tag->name ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="app-l-blog__content">
                            <h2>
                                <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
                            </h2>
                            <p>
                                <?php echo substr(strip_tags($post->post_content), 0, 200);?>
                            </p>
                        </div>
                        <div class="app-l-blog__user">
                            <?php if( get_field('blog_avatar') ): ?>
                                <div class="app-l-blog__u-avatar">
                                    <img data-src="<?php echo the_field('blog_avatar'); ?>" class="img-fluid" alt="<?php echo the_field('author_name'); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="app-l-blog__u-info">
                                <?php if( get_field('author_name') ): ?>
                                    <span class="app-l-blog__u-name"><?php echo the_field('author_name'); ?></span>
                                <?php endif; ?>
                                <span class="app-l-blog__date"><?php the_time('j F Y') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; wp_reset_postdata(); ?>
</div>