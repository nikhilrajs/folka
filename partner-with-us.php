<div class="app-l-partners-with-us__wrapper app-l-bg--dark">
	<section class="container app-l-partners-with-us__container">
		<div class="row">
			<div class="col-lg-8">
				<?php if(get_field('partner_with_us_title')) { ?>
						<h3>
							<?php echo get_field('partner_with_us_title')?>
						</h3>
				<?php } ?>
				<?php if(get_field('partner_with_us_description')) { ?>
							<?php echo get_field('partner_with_us_description')?>
				<?php } ?>
				<?php if(get_field('partner_with_us_actionlabel')) { ?>
					<button class="app-c-btn app-c-btn--teritary">
						<?php echo get_field('partner_with_us_actionlabel')?>
					</button>
					<?php } ?>
			</div>
			<div class="col-lg-4">
					<img src="img/partner-with-us.svg" alt="">
			</div>
		</div>
	</section>
</div>