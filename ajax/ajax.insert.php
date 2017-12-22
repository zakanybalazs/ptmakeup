<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
 $table = $_POST['Ptable'];
 $item = $_POST['data'][0];

foreach ($item as $value) {
  $value = utf8_decode($value);
  $value = mysqli_real_escape_string($server,$value);
}

  $columns = implode(", ", array_keys($item));
        $processed_values = "'";
        $processed_values .= implode("', '", $item);
        $processed_values .= "'";


$q = "INSERT INTO {$table} ($columns) VALUES ($processed_values)";

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
