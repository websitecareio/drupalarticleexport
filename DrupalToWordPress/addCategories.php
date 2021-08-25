<?php
/*
* This code add the categories from drupal to WP using the field data set in WP all import.
 */
add_action( 'init', 'updateCategory' );
function updateCategory() {
      if ( ! is_admin() ) {
         $args = array(
            'post_type' => 'artikel',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
         );

         $loop = new WP_Query( $args );

         while ( $loop->have_posts() ) : $loop->the_post();
           //  print the_title();
            // the_excerpt();
            echo get_the_ID()."<br>";
            $drupalCategory = get_field( "drupalCategory", get_the_ID() );

          foreach(unserialize(base64_decode($drupalCategory)) AS $key => $data) {
                // name
                // description__value


                $term = term_exists( $data["name"], 'kategori' );

          if ( $term !== 0 && $term !== null ) {
              echo __( $data["name"]." allready exists", "textdomain" );
       } else {
                $parent_term_id = $term['term_id']; // get numeric term id

             // Not found, add its with description.
            $termadd =  wp_insert_term(
          $data["name"],   // the term
          'kategori', // the taxonomy
          array(
              'description' => $data["description__value"],
             // 'slug'        => '',
              //'parent'=> $parent_term_id
          )
      );


       }

            }

      /*

      */

         endwhile;

         wp_reset_postdata();
      }
}
