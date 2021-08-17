<?php


function findDrupalUser($uid) {

      $users = get_users();
      // Array of WP_User objects.
      foreach ( $users as $user ) {

          $drupalUid = get_field('drupalUid', 'user_' . $user->ID );

          if($drupalUid == $uid) {
                return $user->ID;
          }

      }

      return "3"; // fallback to admin user

}


?>
