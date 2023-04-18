<section>
	<?php if(get_field('CommunityInsideScreenTitle')) { ?>
			<h3>
				<?php echo get_field('CommunityInsideScreenTitle')?>
			</h3>
	<?php } ?>
	<?php if(get_field('CommunityInsideScreendescription')) { ?>
			<p>
				<?php echo get_field('CommunityInsideScreendescription')?>
			</p>
	<?php } ?>
	<?php if(get_field('CommunityInsideScreenbutton_text')) { ?>
			<button>
				<?php echo get_field('CommunityInsideScreenbutton_text')?>
			</button>
	<?php } ?>
</section>