<div class="app-l-partners-with-us__wrapper app-l-bg--dark">
	<section class="container app-l-partners-with-us__container">
		<div class="row">
			<div class="col-lg-8">
				<div class="py-5 d-flex flex-column align-items-center align-items-lg-start justify-content-center">
					<?php if(get_field('partner_with_us_title')) { ?>
							<h3 class="fs-3 text-center text-lg-start">
								<?php echo get_field('partner_with_us_title')?>
							</h3>
					<?php } ?>
					<div class="fw-light text-center text-lg-start">
						<?php if(get_field('partner_with_us_description')) { ?>
									<?php echo get_field('partner_with_us_description')?>
						<?php } ?>
					</div>
					<?php if(get_field('partner_with_us_actionlabel')) { ?>
						<a href="javascript:void(0);" class="app-c-btn app-c-btn--teritary mt-3" data-fancybox="modal"  data-src="#partner-dialog">
							<?php echo get_field('partner_with_us_actionlabel')?>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 d-flex justify-content-center">
					<img src="<?php echo get_field('partner_with_us_graphic')?>" class="img-fluid align-self-end" alt="">
			</div>
		</div>
	</section>
</div>

<div id="partner-dialog" class="app-l-booknow">
<div class="app-l-bookn__header">
  <h4>Partnering query</h4>
  <p>Please enter the below details and we will get back to you
                                    </p>
</div>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("PartneringQuery") ) : ?>

    <?php endif;?>
</div>