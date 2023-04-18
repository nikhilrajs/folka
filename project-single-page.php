<?php
/*
Template Name: Project Single Page
Template Post Type: projects
*/
?>

<?php get_header(); ?>
<?php global $post; ?>

<section class="app-l-blog__wrap">
    <div class="app-l-blog__d-head">
        <div class="container">
            <?php 
                $tags = get_tags(array(
                    'hide_empty' => false
                ));
            ?>
            <?php foreach ($tags as $tag) { ?>
                <?php if ( has_tag( $tag->slug ) ) { ?>
                    <div class="app-l-blog__d-tag">
                        <span><?php echo $tag->name ?></span>
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="app-l-blog__d-data">
                <h2 class="h1 text-white"><?php the_title(); ?></h2>
            </div>
            <div class="app-l-blog__d-bottom">
                <div class="app-l-blog__d-user">
                    <?php if( get_field('blog_avatar') ): ?>
                        <div class="app-l-blog__d-avatar">
                            <img src="<?php echo the_field('blog_avatar'); ?>" class="img-fluid" alt="<?php echo the_field('author_name'); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="app-l-blog__d-inf">
                        <?php if( get_field('author_name') ): ?>
                            <span class="app-l-blog__d-name"><?php echo the_field('author_name'); ?></span>
                        <?php endif; ?>
                        <span class="app-l-blog__d-date"><?php the_time('j F Y') ?></span>
                    </div>
                </div>
                <div class="app-l-blog__d-action">
                    <div class="app-l-blog__d-item">
                        <a href="javascript:void(0);" class="app-l-copy" id="liveToastBtn">
                            <i class="folka-copy"></i>
                            <span>copy link</span>
                        </a>
                        
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="liveToast" class="toast align-items-center text-white app-l-toast--primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        Link Copied.
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-l-blog__d-item">
                        <a href="javascript:void(0);" class="app-l-bookmark">
                            <i class="folka-bookmark"></i>
                            <span>bookmark</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-l-blog__entry bg-white">
        <div class="container" id="data">
        <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_template_part( 'recent-stories', get_post_format() ); ?>
<?php get_footer(); ?>