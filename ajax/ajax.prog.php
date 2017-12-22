<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
$program_tipus = $_POST['prog_tipus'];
$program_nev = $_POST['prog_nev'];
$q = "SELECT {$program_tipus} FROM vendegek WHERE {$program_tipus} = '{$program_nev}'";
 $sq = mysqli_query($server,$q);
 $count = 0;
 while ($sqa = mysqli_fetch_assoc($sq)) {
   if ($sqa[$program_tipus] != NULL) {
   $count += 1;
 }
 }
 $json  = array();
 if ($sq) {
$json = array($program_nev,$count);
 } else {
  $json = array("error");
 }
header("Content-Type: text/json");
echo json_encode( $json );
 ?>
