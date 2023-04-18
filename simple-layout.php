<?php /* Template Name: Simple Layout */ ?>
<?php get_header(); ?>
<?php global $post; ?>

<section class="app-l-blog__wrap">
    <div class="app-l-blog__d-head">
        <div class="container">
            <div class="app-l-blog__d-data">
                <h2 class="h1 text-white text-center"><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
    <div class="app-l-blog__entry bg-white">
        <div class="container" id="data">
        <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>