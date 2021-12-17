<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'raw_audio' );
 
function placard() {
	Block::make( 'Placard' )
		->add_fields( array(
			Field::make('complex', 'placard', 'Items')
			  ->add_fields(array(
			  	Field::make('text', 'id', 'Id'),
			    Field::make('text', 'title', 'Title'),
			    Field::make('rich_text', 'description', 'Description'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="placard">
				<div class="placard__title" id="para1">
				<?php foreach ($block['placard'] as $items) : ?>
					<h1 id=""><?php echo $items['title'] ?></h1>
				<?php endforeach;  ?>
				</div>
				<div class="placard__title" id="para2">
				<?php foreach ($block['placard'] as $items) : ?>
					<h1 id=""><?php echo $items['title'] ?></h1>
				<?php endforeach;  ?>
				</div>
				<div class="placard__description">
					<?php foreach ($block['placard'] as $items) : ?>
						<div class="placard__description-item">
							<div class="">
								<?php echo $items['description'] ?>
							</div>
						</div>
					<?php endforeach;  ?>
				</div>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
	}
	add_action( 'carbon_fields_register_fields', 'placard' );