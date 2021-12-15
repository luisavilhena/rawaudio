<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function carousel() {
	Block::make( 'Carousel' )
		->add_fields( array(
			Field::make('rich_text', 'text', 'Main description'),
			Field::make('complex', 'carousel', 'Carousel')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Image'),
			    Field::make('text', 'title', 'Title'),
			    Field::make('rich_text', 'description', 'Description'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="carousel">
				<div class="carousel__imgs">
					<?php foreach ($block['carousel'] as $carousel) : ?>
						<?php if ($carousel['img']) : ?>
							<div class="carousel__imgs__item">
								<div class="carousel__imgs__item__img item"style ="background-image: url('<?php echo wp_get_attachment_image_src($carousel['img'],'image_desktop_full_no_crop')[0]; ?>');">>
								</div>
								<div class="menu__item__title">
									<h2><?php echo $carousel['title'] ?></h2>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach;  ?>
				</div>
				<div class="description">
					<div class="main__description">
						<div class="main__description__main">
							<?php echo $block['text'] ?>						
						</div>
					</div>
					<div class="carousel__description">
					<?php foreach ($block['carousel'] as $carousel) : ?>
						<div class="carousel__description__item">
							<div class="carousel__description__item__description">
								<?php echo $carousel['description'] ?>
							</div>
						</div>
					<?php endforeach;  ?>
					</div>
					<div class="menu">
					<?php foreach ($block['carousel'] as $carousel) : ?>
						<div class="menu__item">
						</div>
					<?php endforeach;  ?>
				</div>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'carousel' );