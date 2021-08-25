<?php
/*
* When using Wp all import, a field is set with the drupal featured image.
* This code takes that image and makes it WordPress featured image.
* Cant be done on import due to heavy load on the server*
 */


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
      echo get_field( "drupalFeaturedImage", get_the_ID() );

      // only need these if performing outside of admin environment
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

// example image
$image = "https://demo.kundesider.dk/wp-content/uploads/".get_field( "drupalFeaturedImage", get_the_ID() );

// magic sideload image returns an HTML image, not an ID
$media = media_sideload_image($image, get_the_ID());
if ( !has_post_thumbnail(get_the_ID()) ) {
// therefore we must find it so we can set it as featured ID
if(!empty($media) && !is_wp_error($media)){
   $args = array(
      'post_type' => 'attachment',
      'posts_per_page' => -1,
      'post_status' => 'any',
      'post_parent' => $post_id
   );

   // reference new image to set as featured
   $attachments = get_posts($args);

   if(isset($attachments) && is_array($attachments)){
      foreach($attachments as $attachment){
           // grab source of full size images (so no 300x150 nonsense in path)
           $image = wp_get_attachment_image_src($attachment->ID, 'full');
           // determine if in the $media image we created, the string of the URL exists
           if(strpos($media, $image[0]) !== false){
               // if so, we found our image. set it as thumbnail
               set_post_thumbnail(get_the_ID(), $attachment->ID);
               // only want one image
               break;
           }
      }
   }
}
}


   endwhile;

   wp_reset_postdata();
}
