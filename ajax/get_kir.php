<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
 $nev = $_POST['nev'];
 $nev = mysqli_real_escape_string($server, $nev);

$q = "SELECT kirendeltseg FROM nevek WHERE nevek = '{$nev}'";
 $sq = mysqli_query($server,$q);
 while ($sqa = mysqli_fetch_assoc($sq)) {
   $kir = $sqa['kirendeltseg'];
 }
$z = "SELECT * FROM vendegek WHERE nevek = '{$nev}'";
$sz = mysqli_query($server, $z);
while($sza = mysqli_fetch_assoc($sz)) {
      $id = $sza['nev_id'];
}

if (!isset($id)) {
  $id = 'no';
}
 $json  = array();
 if ($sq) {
$json = array($kir,$id);
 } else {
  $json = array("error");
 }
header("Content-Type: text/json");
echo json_encode( $json );
 ?>
