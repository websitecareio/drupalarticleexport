<?php
function fixImage($image) {
	$image = base64_decode($image);
$image = str_replace("/sites/default/files/","/wp-content/uploads/", $image);
	return $image;
}
function SEOfield($data, $field = "title") {
	$data = base64_decode($data);
	$serializedData = serialize_corrector($data);
	$serializedData = @unserialize($serializedData);

	return $serializedData[$field];

}
      function serialize_corrector($serialized_string){
    // at first, check if "fixing" is really needed at all. After that, security checkup.
    if ( @unserialize($serialized_string) !== true &&  preg_match('/^[aOs]:/', $serialized_string) ) {
        $serialized_string = preg_replace_callback( '/s\:(\d+)\:\"(.*?)\";/s',    function($matches){return 's:'.strlen($matches[2]).':"'.$matches[2].'";'; },   $serialized_string );
    }
    return $serialized_string;
}


function fixStatus($status) {
if($status == "1") { return "publish"; } else { return "draft"; }
}

function fixPermalink($url) {

	$url = str_replace("/artikel/","", $url);

	return $url;
}
function timeFix($time) {
	$newdate = date("Y-M-d", $time);
	return $newdate;
}
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
