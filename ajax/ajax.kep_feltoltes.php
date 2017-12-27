<?php
require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
 $name = $_POST['name'];
 $cat = $_POST['cat'];
 $pat = $_POST['path'];
 $leiras = $_POST['leiras'];
// $pat = "c:/xampp/htdocs/ptkameup/".$pat;

// feltöltés az adatbázisba
$q = "INSERT INTO photo (name, leiras, pat, cat) VALUES ('{$name}', '{$leiras}', '{$pat}','{$cat}')";
 $sq = mysqli_query($server,$q);
 $json  = array();
 if ($sq) {

$dir = getcwd();
$dir2 = explode('ajax',$dir);
$pat = $dir2[0].$pat;
$json = array("ok");
// kép feltöltése a szerverre
// $pat = "c:/xampp/htdocs/ptmakeup/".$pat;
 chmod($_FILES['kep']['tmp_name'], 0755);
rename($_FILES['kep']['tmp_name'],$pat);


 } else {
  $json = array($server->error);
 }
header("Content-Type: text/json");
echo json_encode(array( $json ));
 ?>
