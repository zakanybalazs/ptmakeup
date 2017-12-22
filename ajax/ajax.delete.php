<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
$table = $_POST['table'];
$id_name = $_POST['id_name'];
$id = $_POST['id'];
$q = "DELETE FROM {$table} WHERE $id_name = '{$id}'";
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
