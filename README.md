# Drupal Export
Exports drupal data to CSV for import into other systems. I needed it for WordPress and there is some files specific to WordPress installations. 
You most likely will need to edit files to make it work for you, because the way drupal functions.


## Export Users
Output user data to screen. CSV formed data, splitting with ;

All data from the two tables: users_field_data and user__field_bio are exported.
If your tables got a prefix, you must change the table names to something different.

Any custom data in each table will be exported too. It selects all.

### How to use:
Place the file drupalExportUsers.php in your drupal root directory and open it in a browser. Save the output to a file.

## Export Articles
Output user data to screen. CSV formed data, splitting with TAB

All data from the two tables: node_field_data and node__body are exported.
If your tables got a prefix, you must change the table names to something different.

Any custom data in each table will be exported too. 

### How to use:
Place the file drupalExportArticles.php in your drupal root directory and open it in a browser. Save the output to a file.

## Export Recipes
Place the file drupalExportRecipies.php in your drupal root directory.
Edit the image lines to match your sites images URLs ( Around line 60 - 2 places).
Open it in a browser. Save the output to a file.

The recipies can then be imported to at WP site using WP recipy maker plugin (premium).

This file needs to be changed if you want to import SEO data into Yoast SEO:

File: /wp-recipe-maker-premium/includes/public/class-wprmp-import-json.php

Add this at line 316 after $parent_post_id = wp_insert_post( $parent );

// Yoast SEO
update_post_meta( $parent_post_id, '_yoast_wpseo_metadesc', $json_parent['seometa'] );
update_post_meta( $parent_post_id, '_yoast_wpseo_title', $json_parent['seotitle']);




