<?php /* Template Name: Blog List */ ?>
<?php get_header(); ?>
<?php global $post; ?>
<section class="app-l-blog__wrap">
    <div class="app-l-pin-post">
        <div class="container">
            <div class="app-l-bl__wrap">
                <div class="app-l-pin__slider">
                    
                    <?php
                        $args = array(
                            'post_type'=> 'post',
                            'orderby'    => 'post_date',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'posts_per_page' => 8,
                            'meta_query' => array(
                                array(
                                    'key'     => 'pin',
                                    'value'   => '1'
                                ),
                            ),
                        );
                        $result = new WP_Query( $args );
                    
                        if ( $result-> have_posts() ) : ?>
                        <?php while ( $result->have_posts() ) : $result->the_post();  ?>
                            <div class="app-l-pin__item">
                                <div class="app-l-blog-item">
                                    <div class="app-l-blog__img">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if ( has_post_thumbnail($post->ID) ) {
                                                $thumb_id = get_post_thumbnail_id();
                                                $thumb_url = wp_get_attachment_image_src($thumb_id,'post', true);
                                            ?>
                                                <img data-src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid" />
                                           
                                            <?php } else { ?>
                                                <img data-src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" class="img-fluid" />
                                            <?php } ?> 
                                        </a>
                                    </div>
                                    <div class="app-l-blog__data">
                                        <?php 
                                            $tags = get_tags(array(
                                                'hide_empty' => false
                                            ));
                                        ?>
                                        <?php foreach ($tags as $tag) { ?>
                                            <?php if ( has_tag( $tag->slug ) ) { ?>
                                                <div class="app-l-blog__tag">
                                                    <span><?php echo $tag->name ?></span>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                        <div class="app-l-blog__content">
                                            <h2>
                                                <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
                                            </h2>
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
            </div>
            <div class="app-l-loader">
                <div class="lds-ring">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-l-blog__list-wrap">
        <div class="container">
            <h3 class="h1 text-white">latest blogs</h3>
            <?php get_template_part( 'blog-tile', get_post_format() ); ?> 
            <?php 
                $total = wp_count_posts()->publish;
            ?>  
                <?php 
                    if (  $total > 6 ) : ?>                               
                        <div class="app-l-blog__more text-center">
                            <button class="app-c-btn app-c-btn--secondary">load more blogs</button>
                        </div>
                <?php endif ?>
           
        </div>
    </div>
</section>

<?php get_footer(); ?>