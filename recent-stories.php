<?php
     $total = wp_count_posts()->publish;

     if (  $total >= 1 ) : ?>
    <section class="app-l-recent-stories app-l-bg--dark">
        <div class="container">
            <h2 class="h1">featured blogs</h2>
            <div class="app-l-recent__slider-wrap">
                <div class="app-l-r__slider-over">
                    <?php
                        $args = array(
                            'post_type'=> 'post',
                            'orderby'    => 'post_date',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'posts_per_page' => 8 // this will retrive all the post that is published
                        );
                        $result = new WP_Query( $args );
                        if ( $result-> have_posts() ) : ?>
                        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                            <div class="app-l-slider__block">
                                <div class="app-l-slider__item">
                                    <div class="app-l-recent__image">
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
                                    <div class="app-l-recent__content">

                                            <?php
                                                $tags = get_tags(array(
                                                    'hide_empty' => false
                                                ));
                                            ?>
                                            <?php $posttags = get_the_tags(); ?>
                                            <?php if ( $posttags ) { ?>
                                                <div class="app-l-r__tag">
                                                    <?php foreach ($posttags as $tag) { ?>
                                                        <span><?php echo $tag->name ?></span>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>

                                        <h6>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h6>
                                        <p>
                                            <?php
                                                $content = get_the_content();
                                                if(preg_match('~<p>([\s\S]+?)</p>~', $content, $matches))
                                                    // output blockquote
                                                    echo $matches[1];
                                            ?>
                                        </p>
                                        <div class="app-l-r__user">
                                            <?php if( get_field('blog_avatar') ): ?>
                                                <div class="app-l-r__avatar">
                                                    <img data-src="<?php echo the_field('blog_avatar'); ?>" alt="<?php echo the_field('author_name'); ?>" class="img-fluid">
                                                </div>
                                            <?php endif; ?>
                                            <div class="app-l-r__user-data">
                                                <?php if( get_field('author_name') ): ?>
                                                    <span class="app-l-r__user-name"><?php echo the_field('author_name'); ?></span>
                                                <?php endif; ?>
                                                <span class="app-l-r__date"><?php the_time('j F Y') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" alt="Go to <?php the_title(); ?>" class="app-l-r__link"></a>
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
            <?php if ( !is_page_template( 'project-single-page.php' )) : ?>
                <?php
                    if (  $total > 3 ) : ?>
                        <div class="app-l-recent__more text-center">
                            <a href="blog-list" class="app-c-btn app-c-btn--secondary">See more blogs</a>
                        </div>
                <?php endif ?>
            <?php endif ?>
        </div>
    </section>
<?php endif ?>