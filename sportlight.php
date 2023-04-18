
    <section class="app-l-sportlight">
        <div class="app-l-sportlight__bg" style="background-image: url(<?php echo the_field('banner_image'); ?>);">
            <?php if( get_field('banner_caption') ): ?>
                <div class="app-l-sportlight__caption">
                    <div class="container">
                        <span class="app-l-sportlight__caption-text">
                            <?php echo the_field('banner_caption'); ?>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="app-l-info__mobile">
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
        </div>
        <?php if( get_field('banner_strip_text') ): ?>
            <div class="app-l-sportlight__strip">
                <div class="container">
                    <p><?php echo the_field('banner_strip_text'); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </section>