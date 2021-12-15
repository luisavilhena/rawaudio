<?php

get_header(); ?>

<main class="structure-container">
	<div class="structure-container__content">
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content() ?>
			<?php endwhile; ?>
	</div>

</main>


<?php
get_footer();