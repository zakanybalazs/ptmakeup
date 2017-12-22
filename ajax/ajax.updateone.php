<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
$table = 'vendegek';
$id = $_POST['id'];
$name = $_POST['name'];
$value = $_POST['value'];
$q = "UPDATE {$table} SET {$name} = '{$value}' WHERE nev_id = '{$id}'";
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
