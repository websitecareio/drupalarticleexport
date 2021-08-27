<?php
header("Content-Type: text/plain");
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

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


class drupalExportArticles {

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

      function serialize_corrector($serialized_string){
    // at first, check if "fixing" is really needed at all. After that, security checkup.
    if ( @unserialize($serialized_string) !== true &&  preg_match('/^[aOs]:/', $serialized_string) ) {
        $serialized_string = preg_replace_callback( '/s\:(\d+)\:\"(.*?)\";/s',    function($matches){return 's:'.strlen($matches[2]).':"'.$matches[2].'";'; },   $serialized_string );
    }
    return $serialized_string;
}

      // Getting all articles from the table node_field_data
      // Most information we do not need in this case, but will export anyway.
      public function fetchArticles($type = "article") {

            $stmt = $this->conn->prepare('SELECT * FROM node_field_data WHERE type = :type');
            $stmt->execute(array(
                  'type' => $type
            ));

            $i="1";

            $fieldArray = array();
            $fieldArray["permalink"] = "1";
            $fieldArray["image"] = "1";
            $fieldArray["imagealt"] = "1";
            $fieldArray["categoryData"] = "1";

            // Loop to find first row
            while ($row = $stmt->fetch())
            {

                  // Fetch Bio data
                  $articleBody = $this->fetchArticleBody($row["nid"]);
                  $articleMeta = $this->fetchArticleMeta($row["nid"]);

                  // If this nis first run, then we want some explanation to the rows

                        foreach($row AS $columnName => $data) {

                                    if(!in_array("node_field_data".$columnName,$fieldArray)) {
                                          $fieldArray["node_field_data".$columnName] = "1";
                                    }
                                    //$output .= $columnName."\t";
                        }

                        // If there is BODY data, then include it.
                        if(is_array($articleBody) && count($articleBody) > 0) {
                              foreach($articleBody AS $columnName => $data) {
                                    if(!in_array("node__body".$columnName,$fieldArray)) {
                                          $fieldArray["node__body".$columnName] = "1";
                                    }
                                          //$output .= $columnName."\t";
                              }
                        }

                        // If there is META data, then include it.
                        if(is_array($articleMeta) && count($articleMeta) > 0) {

                              foreach($articleMeta AS $columnName => $data) {

                                    if(!in_array("node__field_meta_tags".$columnName,$fieldArray)) {
                                          $fieldArray["node__field_meta_tags".$columnName] = "1";
                                    }

                                    /*
                                    $serializedData = @$this->serialize_corrector($data);

                                    $serializedData = @unserialize($serializedData);

                                          if ($serializedData !== false) {

                                          foreach($serializedData AS $key => $value) {
                                                if(!in_array("node__field_meta_tags_".$key."",$fieldArray)) {
                                                      $fieldArray["node__field_meta_tags_".$key] = "1";
                                                }
                                                //$output .= "node__field_meta_tags_".$key."\t";
                                          }

                                          } else {
                                                if(!in_array($columnName,$fieldArray)) {
                                                      $fieldArray[$columnName] = "1";
                                                }
                                                //$output .= $columnName."\t";
                                          }
                                          */
                              }

                        }

                  //echo $output."\r\n";

                  }

                  foreach($fieldArray AS $key => $data) {
                        echo "$key\t";
                  }
                  echo "\r\n";


                  $stmt = $this->conn->prepare('SELECT * FROM node_field_data WHERE type = :type');
                  $stmt->execute(array(
                        'type' => $type
                  ));

            while ($row = $stmt->fetch())
            {

                  // Check if this is an empty user
                  if($row["title"] == "") { continue; }

                  $output = "";

                  // Fetch Bio data
                  $articleBody = $this->fetchArticleBody($row["nid"]);
                  $articleMeta = $this->fetchArticleMeta($row["nid"]);
                  $articleCategoryData = $this->fetchArticleCategory($row["nid"]);

                  // Now output the rows.
                  $output = "";

                  $output .= "".$this->fetchArticlePermalinks($row["nid"]).""."\t"; // Permalink

                  $imageData = $this->fetchArticleTargetId($row["nid"]);
                  $imageUrl = $this->fetchArticleImage($imageData["field_image_target_id"]);

                  $output .= "$imageUrl"."\t";
                  $output .= "".$imageData["field_image_alt"].""."\t";

                  // Category data
                  $output .= "".$articleCategoryData."\t";

                  foreach($row AS $columnName => $data) {
                              $output .= $row[$columnName]."\t";
                  }

                  // If there is BODY data, then include it.
                  if(is_array($articleBody) && count($articleBody) > 0) {

                        foreach($articleBody AS $columnName => $data) {

                                    if(
                                          $columnName == "body_value" && $articleBody["body_format"] == "basic_html" ||
                                          $columnName == "body_value" && $articleBody["body_format"] == "full_html" ||
                                          $columnName == "body_value" && $articleBody["body_format"] == "word" ||
                                          $columnName == "body_value" && $articleBody["body_format"] == "admin_full_no_editor" ||
                                          $columnName == "body_summary" && $articleBody["body_format"] == "basic_html" ||
                                          $columnName == "body_summary" && $articleBody["body_format"] == "full_html"
                                    ) {
                                          $output .= base64_encode(trim(preg_replace('/\s\s+/m', ' ', html_entity_decode($data))))."\t";
                                    } else {
                                          $output .=  base64_encode(trim(preg_replace('/\s\s+/m', ' ', html_entity_decode($data))))."\t";
                                    }
                        }
                  }

                  // If there is META data, then include it.
                  if(is_array($articleMeta) && count($articleMeta) > 0) {

                        foreach($articleMeta AS $columnName => $data) {

                                    //$output .= base64_encode($value)."\t";
                                    $output .= base64_encode($data)."\t";

                                    /*
                              $serializedData = @$this->serialize_corrector($data);
                              $serializedData = @unserialize($serializedData);

                                    if ($serializedData !== false) {

                                    foreach($serializedData AS $key => $value) {

                                          if($key == "description") {
                                                $output .= trim(preg_replace('/\s\s+/', ' ', html_entity_decode($value)))."\t";
                                          } else {
                                                $output .= $value."\t";
                                          }

                                    }

                                    } else {

                                          $output .= $columnName."\t";
                                    }*/
                        }
                  }

                  echo $output."\r\n";

                  $i++;
            }

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
            //print_r($data); die();
            return $data;

      }

      // Fetches article body
      public function fetchArticleMeta($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM node__field_meta_tags WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $entity_id
            ));
            $data = $stmt->fetch();
            //print_r($data); die();
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
            //print_r($data); die();
            return $data;

      }

      // Fetches image URL
      public function fetchArticleImage($fid) {

            $stmt = $this->conn->prepare('SELECT * FROM file_managed WHERE fid = :fid LIMIT 1');
            $stmt->execute(array(
                  'fid' => $fid
            ));
            $data = $stmt->fetch();
            //print_r($data); die();
            return str_replace("public://","",$data["uri"]);

      }




}

$drupalExportArticles = new drupalExportArticles($databases['default']['default']);


echo $drupalExportArticles->fetchArticles();
?>
