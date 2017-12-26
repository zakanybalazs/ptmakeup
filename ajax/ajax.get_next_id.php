<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
$table = $_POST['table'];
$id_name = $_POST['id_type'];
$q = "SELECT * FROM $table";
$sq = mysqli_query($server, $q);
$item = 1;
while($sqa = mysqli_fetch_assoc($sq)) {
      $item = $sqa[$id_name];
}

$json  = array();
if ($sq) {
  $json = array($item);
} else {
  $json = array($server->error);
}


header("Content-Type: text/json");
echo json_encode(array( $json ));
 ?>
