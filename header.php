
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php bloginfo('name'); { echo ' | '; } if(wp_title('', false)) {} else { echo bloginfo('description'); }wp_title(''); ?></title>
<?php 
    $metaValue = myprefix_get_theme_option( 'meta_description' );
?>
<meta name="description" content="<?php echo $metaValue; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#3CA06C" class="metta-color">
<meta name="google" value="notranslate">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/main.css">
<link rel="icon" type="image/svg+xml" href="<?php echo get_bloginfo('template_directory'); ?>/favicon.svg">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_directory'); ?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('template_directory'); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('template_directory'); ?>/favicon-16x16.png">
<script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>
    <body <?php body_class(); ?>>
        <?php wp_reset_query(); ?>
        <header class="app-l-header">
            <div class="container">
                <div class="app-l-header__row">
                    <?php if( myprefix_get_theme_option('select_logo') ): ?>
                        <?php 
                            $value = myprefix_get_theme_option( 'select_logo' );
                        ?>
                        <div class="app-l-header__logo">
                            <h1 class="app-l-logo">
                                <a href="<?php echo home_url();?>">
                                    <object type="image/svg+xml" data="<?php echo $value; ?>" class="logo-obj">
                                    </object>
                                </a>
                            </h1>
                        </div>
                    <?php endif; ?>  
                    
                    <?php if ( is_page_template('blog-list.php') || is_search() || ! is_page_template('simple-layout.php') && ! is_page_template('project-single-page.php') && ! is_front_page() && ! is_page_template('team.php') && ! is_page_template('websites.php') && ! is_category()) { ?>
                        <div class="app-l-search">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("header") ) : ?>

                            <?php endif;?>
                        </div>
                    <?php } else{ ?>
                        <div class="app-l-header__info">
                            <?php if( myprefix_get_theme_option('input_phone') ): ?>  
                                <?php 
                                    $value = myprefix_get_theme_option( 'input_phone' );
                                ?>
                                <div class="app-l-header__phone">
                                    <a href="tel:<?php echo $value; ?>">
                                        <i class="folka-phone"></i>
                                        <span><?php echo $value; ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>  

                            <?php if( myprefix_get_theme_option('input_email') ): ?>  
                                <?php 
                                    $value = myprefix_get_theme_option( 'input_email' );
                                ?>
                                <div class="app-l-header__mail">
                                    <a href="mailto:<?php echo $value; ?>">
                                        <i class="folka-mail"></i>
                                        <span><?php echo $value; ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                    <div class="app-l-hamburger">
                        <button class="app-l-hamburger-btn">
                            <i class="folka-menu"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        
        