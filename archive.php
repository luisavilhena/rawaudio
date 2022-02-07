<?php

get_header(); ?>

<main id="project-list" class="structure-container structure-color-light-pink">
	<div class="structure-container__content">
		<div class="project-list">
			<?php while (have_posts()) : the_post(); ?>
				<div class="project-list__item">
					<img  class="lazyload" src="<?php the_post_thumbnail_url("horizontal") ?>">
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
		<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" taxonomy="portfoliocategories" taxonomy_terms="advertising, all, art, classics, content, films, games, latest, tv" taxonomy_operator="OR" images_loaded="false" placeholder="false" scroll_distance="50" transition="masonry" masonry_selector=".project-list__item" masonry_animation="slide-down"]') ?>
	</div>

</main>

<?php
get_footer();
