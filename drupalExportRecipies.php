<?php

// Get Database information
require dirname(__FILE__)."/sites/default/settings.php";
/*
$databases['default']['default'] = [
    'database' => '',
    'username' => '',
    'password' => '',
    'host' => 'localhost',
    'port' => '3306',
    'driver' => 'mysql',
    'prefix' => '',
    'collation' => 'utf8mb4_general_ci',
];
*/

class drupalExportRecipes {

      // Runs everytime
      function __construct($db) {
            $dsn = "mysql:host=".$db["host"].";dbname=".$db["database"].";charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                 $pdo = new PDO($dsn, $db["username"], $db["password"], $options);
                 $this->conn = $pdo;

            } catch (\PDOException $e) {
                 throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }

      }

      function fixStatus($status) {
      if($status == "1") { return "publish"; } else { return "draft"; }
      }
      // Getting all recipe from the table node_field_data
      // Most information we do not need in this case, but will export anyway.
      // Export of this will be put into a template.
      public function fetchContent($type = "recipe") {

            $stmt = $this->conn->prepare('SELECT * FROM node_field_data WHERE type = :type ORDER BY nid DESC');
            $stmt->execute(array(
                  'type' => $type
            ));

            $i="1";
            // Loop to find first row
            $templateOutput = array();
            while ($row = $stmt->fetch())
            {

                  $permalink = $this->fetchArticlePermalinks($row["nid"]);
                  $post_status = $this->fixStatus($row["status"]);
                  $type = "food"; // howto, food, other - we use food here becuase its recipies
                  // Image data
                  $imageData = $this->fetchArticleTargetId($row["nid"]);
                  $image_url = "https://example.com/sites/default/files/styles/thumbnail/public/".$this->fetchArticleImage($imageData["field_image_target_id"]);

                  // Large image.
                  $imageData = $this->fetchImageTargetId($row["nid"]);
                  $imageUrl = "https://example.com/sites/default/files/styles/800b4/public/".$this->fetchImage($imageData["field_image_target_id"]);

                  $name = $row["title"];
                  $summary = $this->fetchRecipeUnderrubrik($row["nid"]);
                  // Servings
                  $servings = $this->fetchRecipeYield($row["nid"]);
                  $servings_unit = $this->fetchRecipeYieldUnit($row["nid"]);

                  $prep_time = $this->fetchRecipePrepTime($row["nid"]);
                  $cook_time = $this->fetchRecipeCookTime($row["nid"]);

                  $tags = $this->fetchRecipeTags($row["nid"]);
                  $ingredients = $this->fetchRecipeIngredients($row["nid"]);
                  $instructions = $this->fetchRecipeInstructions($row["nid"]);
                  $notes = $this->fetchRecipeNotes($row["nid"]);
                  $created = $row["created"];
                  $post_content = $this->fetchRecipeDescription($row["nid"]);

      $templateOutput[] = array(
           "id" => $row["nid"], // 83 - dont set ID , hopefully it gives ID on import
           "slug" => $permalink, // Permalink
           "post_status" => $post_status, // Post status publish or draft
           "type" => $type, // type
           "image_url" => $imageUrl, // image
           "pin_image_url" => $image_url, // image same as above in template
            "name" => $name, // name
           "summary" => $summary, // summary
           "author_display" => "post_author", // author display not used in template
           "author_name" => "", // Author name  not used in template
           "author_link" => "", // AUthor link  not used in template
           "cost" => "", // Cost  not used in template
           "servings" => $servings, // Servings
           "servings_unit"=> $servings_unit, // Servings unit
           "prep_time" => $prep_time, // Prep time in minutes
           "prep_time_zero" => "", // prep time zero  not used in template
           "cook_time" => $cook_time,
           "cook_time_zero" => "", // cook time zeo not used in template
           "total_time" => "0", // total time not used in template
           "custom_time" => "0", // custom time not used in template
           "custom_time_zero" => "", // custom time zero not used in template
           "custom_time_label" => "", // custom time label not used in template
           "tags" => array( // all tags for this recipe
               "course" => array(), // course not used in drupal
               "cuisine" => array(), // cuisine not used in drupal
               "keyword" => $tags // array of cointent
         ),
          "equipment" => array(), // equitment not used in drupal
          "ingredients_flat" => $ingredients,
          "instructions_flat" => $instructions,
          "video_embed" => "",
          "notes" => $notes,
           "nutrition" => array(),
           "custom_fields" => array(),
           "ingredient_links_type" => "global",
           "unit_system" => "default",
           "my_emissions" => "",
           "parent" => array( ////////////
                "ID" => "",       ////////////
                "post_date" => date("Y-m-d H:I:S" ,$created),
                "post_name" => $name,
                "post_title" => $name,
                "post_content" => addslashes($post_content)."[wprm-recipe id='".$row["nid"]."']",
                "post_excerpt" => "",
                "post_status" => $post_status,
                "post_type" => "opskrift",
                "image_url" => $imageUrl,
                "tags" => array(
                     "category" => $tags
                ),
           )
     );

     $i++;
     if($i == "10") { break; }
}

     return $templateOutput;

}

// Fetches image targetId
public function fetchImageTargetId($entity_id) {

      $stmt = $this->conn->prepare('SELECT * FROM node__field_image WHERE entity_id = :entity_id LIMIT 1');
      $stmt->execute(array(
            'entity_id' => $entity_id
      ));
      $data = $stmt->fetch();
      //print_r($data); die();
      return $data;

}
      // Fetches image URL
      public function fetchImage($fid) {

            $stmt = $this->conn->prepare('SELECT * FROM file_managed WHERE fid = :fid LIMIT 1');
            $stmt->execute(array(
                  'fid' => $fid
            ));
            $data = $stmt->fetch();
            //print_r($data); die();
            return str_replace("public://","",$data["uri"]);

      }


      // Fetch recipi ntes
      public function fetchRecipeNotes($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__recipe_notes WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetch();

            return $data["recipe_notes_value"];

      }

      // Fetch recipi descrption
      public function fetchRecipeDescription($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__recipe_description WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetch();

            return $data["recipe_description_value"];

      }

      // Fetch recipi underrubrik
      public function fetchRecipeUnderrubrik($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__field_underrubrik WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetch();

            return $data["field_underrubrik_value"];

      }
      // Fetch recipi fetchRecipeYield
      public function fetchRecipeYield($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__recipe_yield_amount WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetch();

            return $data["recipe_yield_amount_value"];

      }
      // Fetch recipi fetchRecipeYield
      public function fetchRecipeYieldUnit($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__recipe_yield_unit WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetch();

            return $data["recipe_yield_unit_value"];

      }
      // Fetch recipi prep timep
      public function fetchRecipePrepTime($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__recipe_prep_time WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetch();

            return $data["recipe_prep_time_value"];

      }
      // Fetch recipi cook time
      public function fetchRecipeCookTime($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__recipe_cook_time WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetch();

            return $data["recipe_cook_time_value"];

      }
      // Fetch recipi tags
      public function fetchRecipeTags($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM node__field_tags WHERE entity_id = :entity_id');
            $stmt->execute(array(
                  'entity_id' => $nid
            ));
            $data = $stmt->fetchAll();
            $tagsData = array();
            foreach($data AS $key => $data) {

                  $field_ingredient_target_id = $data["field_tags_target_id"];

                  // Fetch the category name and data
                  $stmt = $this->conn->prepare('SELECT * FROM taxonomy_term_field_data WHERE tid = :tid LIMIT 1');
                  $stmt->execute(array(
                        'tid' => $field_ingredient_target_id
                  ));
                  $data = $stmt->fetch();

                  $tagsData[] = $data["name"];

            }
            return $tagsData;

      }
      // Fetch recipi tags
      public function fetchRecipeIngredients($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM node__field_ingredients WHERE entity_id = :entity_id ORDER by delta ASC');
            $stmt->execute(array(
                  'entity_id' => $entity_id // example 4178
            ));
            $data = $stmt->fetchAll();
            $ingredientsData = array();
            foreach($data AS $key => $data) {

                  $field_ingredient_target_id = $data["field_ingredients_target_id"]; // exmaple 239

                  // Fetch the ingredients
                  $stmt = $this->conn->prepare('SELECT * FROM paragraph__field_ingredients WHERE entity_id = :entity_id ');
                  $stmt->execute(array(
                        'entity_id' => $field_ingredient_target_id
                  ));
                  $data = $stmt->fetchAll();



                                          $stmt = $this->conn->prepare('SELECT * FROM paragraph__field_title WHERE entity_id = :entity_id LIMIT 1');
                                          $stmt->execute(array(
                                                'entity_id' => $field_ingredient_target_id, // 103 = cutron
                                          ));
                                          $paragraph__field_title = $stmt->fetch();

                                          $ingredientsData[] = array(
                                                "name" => $paragraph__field_title["field_title_value"], // Name here. Example Hyldebærsaft is ID 524 and is a paragraf data
                                                "type" => "group",
                                          );


                  foreach($data AS $key => $data) {

                        // Get the overall name of the field
                        $stmt = $this->conn->prepare('SELECT * FROM ingredient_field_data WHERE id = :id LIMIT 1');
                        $stmt->execute(array(
                              'id' => $data["field_ingredients_target_id"], // 103 = cutron
                        ));
                        $ingredient_field_data = $stmt->fetch();





                        $field_ingredients_target_id = $data["field_ingredients_target_id"]; // 332
                        $field_ingredients_note	 = $data["field_ingredients_note"]; // her er det fra ribbenstege
                        $field_ingredients_quantity = $data["field_ingredients_quantity"]; // 0
                        $field_ingredients_unit_key = $data["field_ingredients_unit_key"]; // [empty]



                        //$stmt = $this->conn->prepare('SELECT * FROM paragraph__field_title WHERE entity_id = :entity_id LIMIT 1');
                        //$stmt->execute(array(
                        //      'entity_id' => $field_ingredients_target_id
                        //));
                        //$data = $stmt->fetch();


                        $name = $data["name"]; // [empty]

                        $ingredientsData[] = array(
                              "amount" => $field_ingredients_quantity,
                              "unit" => $field_ingredients_unit_key,
                              "name" => $ingredient_field_data["name"],
                              "notes" => $field_ingredients_note,
                              "type" => "ingredient"
                        );
            }

            }
            return $ingredientsData;

      }
      // Fetch fetchRecipeInstructions
      public function fetchRecipeInstructions($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM node__recipe_instructions WHERE entity_id = :entity_id ORDER by delta ASC LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $entity_id // example 4178
            ));
            $data = $stmt->fetchAll();
            $instructionsData = array();
            foreach($data AS $key => $data) {


                  $instructions_value = $data["recipe_instructions_value"]; // exmaple 239

                  // Split the data into smaller chunks.
                  $instructions = explode("<h2>", $instructions_value);
                  $instructionsCount = count($instructions);

                  foreach($instructions AS $instruction => $instructionData) {

                        if($instructionsCount > 1) {
                              $instructionDataSplit = explode("</h2>", $instructionData, 2);
                              $instructionTitle = $instructionDataSplit["0"];
                              $instructionContent = $instructionDataSplit["1"];
                        } else {
                              $instructionTitle = "";
                              $instructionContent = $instructionData;
                        }

                        $instructionsData[] = array(
                              "name" => $instructionTitle,
                              "type" => "group",
                        );
                        $instructionsData[] = array(
                              "name" => "",
                              "text" => addslashes($instructionContent),
                              "type" => "instruction",
                              "image_url" => "",
                        );

                  }


            }

            return $instructionsData;

      }

      // Fetch permalink
      public function fetchArticlePermalinks($nid) {

            $stmt = $this->conn->prepare('SELECT * FROM path_alias WHERE path = :nodePath LIMIT 1');
            $stmt->execute(array(
                  'nodePath' => "/node/$nid"
            ));
            $data = $stmt->fetch();

            return $data["alias"];

      }
      // Fetches article body
      public function fetchArticleBody($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM node__body WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $entity_id
            ));
            $data = $stmt->fetch();

            return $data;

      }

      // Fetches article body
      public function fetchArticleMeta($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM node__field_meta_tags WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $entity_id
            ));
            $data = $stmt->fetch();

            return $data;

      }

      // Fetches article body
      public function fetchArticleCategory($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM node__field_kategori WHERE entity_id = :entity_id'); // Do not limit because we could have more categories
            $stmt->execute(array(
                  'entity_id' => $entity_id
            ));
            $data = $stmt->fetchAll();

            // Fetches the category ID
            $categoryData = array();
            foreach($data AS $key => $data) {
                  $field_kategori_target_id = $data["field_kategori_target_id"];

                  // Fetch the category name and data
                  $stmt = $this->conn->prepare('SELECT * FROM taxonomy_term_field_data WHERE tid = :tid LIMIT 1');
                  $stmt->execute(array(
                        'tid' => $field_kategori_target_id
                  ));
                  $data = $stmt->fetch();

                  $categoryData[] = $data;


            }

            $data = base64_encode(serialize($categoryData));
            return $data;

      }

      // Fetches image targetId
      public function fetchArticleTargetId($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM node__field_image WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $entity_id
            ));
            $data = $stmt->fetch();

            return $data;

      }

      // Fetches image URL
      public function fetchArticleImage($fid) {

            $stmt = $this->conn->prepare('SELECT * FROM file_managed WHERE fid = :fid LIMIT 1');
            $stmt->execute(array(
                  'fid' => $fid
            ));
            $data = $stmt->fetch();

            return str_replace("public://","",$data["uri"]);

      }


}

$drupalExportContent = new drupalExportRecipes($databases['default']['default']);
//echo "<pre>";
echo json_encode($drupalExportContent->fetchContent());
//echo print_r($drupalExportContent->fetchContent());
