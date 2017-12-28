<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
$id = $_POST['id'];
$div = $_POST['div'];
$data = $_POST['data'];
$name = $data[0]['name'];
$leiras = $data[0]['leiras'];
if ($div == "photo") {
  $cat = $data[0]['cat'];
  $q = "UPDATE photo SET name = '{$name}', leiras = '{$leiras}', cat = '{$cat}' WHERE photo_id = '{$id}'";
} else {
  $q = "UPDATE categories SET name = '{$name}', leiras = '{$leiras}' WHERE cat_id = '{$id}'";

}

$sq = mysqli_query($server,$q);
$json  = array();
if ($sq) {
  $json = array('ok');
} else {
  $json = array($server->error);
}


header("Content-Type: text/json");
echo json_encode(array( $json ));
 ?>
