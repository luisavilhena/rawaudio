<?php

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<main id="project-single" class="structure-container structure-color-light-pink">
	<div class="structure-container__content">
			<div class="project-single__header">
				<div class="project-single__header__btn">
					<span class="arrow-1"></span>
					<span class="arrow-2"></span>
					<Input class="button"type = "button" onclick = "document.location.href = 'projects';">
				</div>
				<img class="project-single__header__img"  data-featherlight="<?php the_post_thumbnail_url("vertical") ?>"  src='<?php the_post_thumbnail_url("vertical") ?>'>
				</div>
				<?php the_content(); ?>
			</div>
	</div>
</main>
<?php endwhile; ?>

<?php
get_footer();