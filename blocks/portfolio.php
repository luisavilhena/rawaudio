<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 

Block::make('Lista de projetos')
  ->add_fields(array(
    Field::make('association', 'projects', 'Projetos')
      ->set_types(array(
        array(
          'type' => 'post',
          'post_type' => 'portfolio',
        )
      )),
  ))
  ->set_render_callback(function ($fields) { ?>
      <div id="project-list">
        <div class="project-list">
          

        <?php

        //Get array of terms
        $terms = get_the_terms($post->ID, 'portfolio', 'string');
        //Pluck out the IDs to get an array of IDS
        $term_ids = wp_list_pluck($terms, 'term_id');

        //lista de id -> for

        $args = array(
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'posts_per_page' => 10000,
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfoliocategories',
                    // 'field'    => 'term_ids',
                    // 'terms'    => $term_ids,
                    'operator' => 'XXX' 
                ),
            ),
        );
          
        $arr_posts = new WP_Query($args);
          
        if ( $arr_posts->have_posts() ) :
          foreach ($fields['projects'] as $items) :
            while ( $arr_posts->have_posts() ) :
                $arr_posts->the_post();
                if (get_the_ID() === $items['id']) :
                ?>

                <div class="project-list__item">
                  <img  class="lazyload"src="<?php the_post_thumbnail_url("horizontal") ?>">
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
                    <h4>
                      <?php the_excerpt(); ?>
                      <span></span>
                    </h4>
                  </div>
                  <?php the_content() ?>
                </div>
                <?php
                endif;
            endwhile;
          endforeach;
        endif;?>
        <div class="close">
        </div>
      </div>
    </div>

  <?php

  });
