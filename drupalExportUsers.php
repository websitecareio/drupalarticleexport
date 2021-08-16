<?php
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

class drupalExportUsers {

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

      // Getting all users from the table users_field_data
      // Most information we do not need in this casem, but will export anyway.
      public function fetchUsers() {

            $stmt = $this->conn->query('SELECT * FROM users_field_data');
            $i="1";
            while ($row = $stmt->fetch())
            {

                  // Check if this is an empty user
                  if($row["pass"] == "" || $row["mail"] == "") { continue; }


                  $output = "";

                  // Fetch Bio data
                  $bio = $this->fetchUserBio($row["uid"]);

                  // If this nis first run, then we want some explanation to the rows

                  if($i == "1") {
                        foreach($row AS $columnName => $data) {
                                    $output .= $columnName.";";
                        }

                        // If there is BIO data, then include it.
                        if(is_array($bio) && count($bio) > 0) {
                              foreach($bio AS $columnName => $data) {
                                          $output .= $columnName.";";
                              }
                        }

                  echo $output."<br>";

                  }

                  // Now output the rows.
                  $output = "";
                  foreach($row AS $columnName => $data) {
                              $output .= $row[$columnName].";";
                  }

                  // If there is BIO data, then include it.
                  if(is_array($bio) && count($bio) > 0) {
                        foreach($bio AS $columnName => $data) {
                                    $output .= $bio[$columnName].";";
                        }
                  }

                  echo $output."<br>";

                  $i++;
            }

      }

      // Fetches the users BIO data
      public function fetchUserBio($entity_id) {

            $stmt = $this->conn->prepare('SELECT * FROM user__field_bio WHERE entity_id = :entity_id LIMIT 1');
            $stmt->execute(array(
                  'entity_id' => $entity_id
            ));
            $data = $stmt->fetch();

            return $data;

      }



}

$drupalExportUsers = new drupalExportUsers($databases['default']['default']);


echo $drupalExportUsers->fetchUsers();
?>
