<?php

get_header(); ?>

<main id="project-list" class="structure-container structure-color-light-pink">
	<div class="structure-container__content">
		<div class="project-list">
			<?php while (have_posts()) : the_post(); ?>
				<div class="project-list__item">
					<img  class=""src="<?php the_post_thumbnail_url("horizontal") ?>'">
				  <div class="project-list__item__title">
				  	<div>
				  		<?php if (carbon_get_the_post_meta('client')):?>
				  		<p><?php echo carbon_get_the_post_meta('client'); ?></p>
				  		<?php endif;?>
				  		<?php if (carbon_get_the_post_meta('agency')):?>
				  		<p><?php echo carbon_get_the_post_meta('agency'); ?></p>
				  		<?php endif;?>
				  		<span></span>
				  	</div>
				    <h4><?php the_excerpt(); ?>
				    	<span></span>
				    </h4>
				  </div>
				  <?php the_content() ?>
				</div>
			<?php endwhile; ?>
			<div class="close">
			</div>
		</div>
	</div>

</main>

<?php
get_footer();
