<?php

 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'raw_audio' );
 
function list_title_image() {
	Block::make( 'List: title and image' )
		->add_fields( array(
			Field::make('complex', 'items', 'Items')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Imagem'),
			    Field::make('text', 'title', 'Title'),
			    Field::make('text', 'subtitle', 'Subtitle'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="list-title-image structure-unit-block">
				<?php foreach ($block['items'] as $item) : ?>
					<div class="list-title-image__item">
						<h3 class="list-title-image__item-title"><?php echo $item["title"]?></h3>
						<h4 class="list-title-image__item-subtitle"><?php echo $item["subtitle"]?></h4>
						<?php if ($item['img']):  ?>
						<img class="list-title-image__item-img" src="<?php echo wp_get_attachment_image_src($item['img'], '')[0]; ?>">
						<?php endif;  ?>
					</div>
				<?php endforeach;  ?>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'list_title_image' );