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
Not yet ready
