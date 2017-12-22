<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
 $nev = $_POST['nev'];
 $nev = mysqli_real_escape_string($server, $nev);
 $tipus = $_POST['tipus'];
 $adatok = $_POST['adatok'];
 $adatok = json_encode($adatok);

$q = "INSERT INTO teszt (nev, tipus, adatok) VALUES ('{$nev}','{$tipus}','{$adatok}')";
 $sq = mysqli_query($server,$q);
 $json  = array();
 if ($sq) {
$json = array('ok');
 } else {
  $json = array($server->error);
 }
header("Content-Type: text/json");
echo json_encode( $json );
 ?>
