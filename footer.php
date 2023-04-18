
        <footer class="app-l-footer">
            <div class="container">
                <div class="app-l-footer__top">
                    <div class="app-l-ft__left">
                        <div class="app-l-ft__logo">
                            <a href="<?php echo home_url();?>">
                                <img src="<?php echo get_bloginfo('template_directory'); ?>/img/logo-revert.svg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="app-l-ft__nav">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => 'Main Menu'
                                ) 
                            ); ?>
                        </div>
                    </div>
                    <div class="app-l-ft__right">
                        <div class="app-l-ft__connect">
                            <?php if( myprefix_get_theme_option('input_twitter') ): ?>
                                <?php 
                                    $value = myprefix_get_theme_option( 'input_twitter' );
                                ?>
                                <a target="_blank" href="<?php echo $value; ?>"><i class="folka-twitter"></i></a>
                            <?php endif; ?> 
                            
                            <?php if( myprefix_get_theme_option('input_fb') ): ?>
                                <?php 
                                    $value = myprefix_get_theme_option( 'input_fb' );
                                ?>
                                <a target="_blank" href="<?php echo $value; ?>"><i class="folka-facebook"></i></a>
                            <?php endif; ?>

                            <?php if( myprefix_get_theme_option('input_insta') ): ?>
                                <?php 
                                    $value = myprefix_get_theme_option( 'input_insta' );
                                ?>
                                <a target="_blank" href="<?php echo $value; ?>"><i class="folka-insta"></i></a>
                            <?php endif; ?>

                            <?php if( myprefix_get_theme_option('input_linkedIn') ): ?>
                                <?php 
                                    $value = myprefix_get_theme_option( 'input_linkedIn' );
                                ?>
                                <a target="_blank" href="<?php echo $value; ?>"><i class="folka-linkedin"></i></a>
                            <?php endif; ?>
                        </div>
                        <div class="app-l-f__info">
                            <?php if( myprefix_get_theme_option('input_phone') ): ?>  
                                <?php 
                                    $value = myprefix_get_theme_option( 'input_phone' );
                                ?>
                                <div class="app-l-f__phone">
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
                                <div class="app-l-f__mail">
                                    <a href="mailto:<?php echo $value; ?>">
                                        <i class="folka-mail"></i>
                                        <span><?php echo $value; ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="app-l-footer__bottom">
                    <div class="app-l-fb__left">
                        <p><?php echo date("Y"); ?> Copyright and All Rights Reserved</p>
                    </div>
                    <div class="app-l-fb__right">
                        <?php wp_nav_menu(
                            array(
                                'menu' => 'Footer Privacy'
                            ) 
                        ); ?>
                    </div>
                </div>
            </div>
        </footer>

        <div class="app-l-menu__display">
            <button class="app-l-menu__close">
                <i class="folka-close"></i>
            </button>
            <?php if( myprefix_get_theme_option('select_logo') ): ?>
                <?php 
                    $value = myprefix_get_theme_option( 'select_logo' );
                ?>
                <div class="app-l-menu__logo">
                    <img src="<?php echo $value; ?>" class="img-fluid" alt= "<?php bloginfo('name'); ?>">
                </div>
            <?php endif; ?>  
            
            <div class="app-l-menu__explr">
                <span>explore folka</span>
            </div>
            <div class="app-l-menu__main">
                <?php wp_nav_menu(
                    array(
                        'menu' => 'Main Menu'
                    ) 
                ); ?>
            </div>
            <div class="app-l-menu__sub">
                <?php wp_nav_menu(
                    array(
                        'menu' => 'Header Sub Menu'
                    ) 
                ); ?>
            </div>
            <div class="app-l-m__info">

                <?php if( myprefix_get_theme_option('input_phone') ): ?>  
                    <?php 
                        $value = myprefix_get_theme_option( 'input_phone' );
                    ?>
                    <div class="app-l-m__phone">
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
                    <div class="app-l-m__mail">
                        <a href="mailto:<?php echo $value; ?>">
                            <i class="folka-mail"></i>
                            <span><?php echo $value; ?></span>
                        </a>
                    </div>
                <?php endif; ?>
                
            </div>
            <div class="app-l-m__connect">
                <?php if( myprefix_get_theme_option('input_twitter') ): ?>
                    <?php 
                        $value = myprefix_get_theme_option( 'input_twitter' );
                    ?>
                    <a target="_blank" href="<?php echo $value; ?>"><i class="folka-twitter"></i></a>
                <?php endif; ?> 
                
                <?php if( myprefix_get_theme_option('input_fb') ): ?>
                    <?php 
                        $value = myprefix_get_theme_option( 'input_fb' );
                    ?>
                    <a target="_blank" href="<?php echo $value; ?>"><i class="folka-facebook"></i></a>
                <?php endif; ?>

                <?php if( myprefix_get_theme_option('input_insta') ): ?>
                    <?php 
                        $value = myprefix_get_theme_option( 'input_insta' );
                    ?>
                    <a target="_blank" href="<?php echo $value; ?>"><i class="folka-insta"></i></a>
                <?php endif; ?>

                <?php if( myprefix_get_theme_option('input_linkedIn') ): ?>
                    <?php 
                        $value = myprefix_get_theme_option( 'input_linkedIn' );
                    ?>
                    <a target="_blank" href="<?php echo $value; ?>"><i class="folka-linkedin"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <?php wp_footer(); ?> 
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/popper.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/packery.pkgd.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/lightslider.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/jquery.mCustomScrollbar.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/jquery-scrolltofixed-min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/fancybox.umd.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/select2.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/vendor/datedropper-jquery.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/main.js"></script>
        
        <script type="text/javascript">
            [].forEach.call(document.querySelectorAll('img[data-src]'),    function(img) {
                img.setAttribute('src', img.getAttribute('data-src'));
                img.onload = function() {
                    img.removeAttribute('data-src');
                };
            });

            
        </script>
        
    </body>
</html>