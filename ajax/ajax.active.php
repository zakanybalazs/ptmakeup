<?php
require_once '../config/db.php';
 $server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);

 $json  = array();
 $q = "SELECT nevek FROM nevek";
 $sq = mysqli_query($server,$q);
 $i = 0;
 while ($sqa = mysqli_fetch_assoc($sq)) {
   $nev = $sqa['nevek'];
   $nev = mysqli_real_escape_string($server, $nev);
   $w = "SELECT status, a, b, c, d FROM vendegek WHERE nevek = '{$nev}'";
   $sw = mysqli_query($server, $w);
   if (mysqli_num_rows($sw)>0) {
   while ($swa = mysqli_fetch_assoc($sw)) {
     $status = 'inactive';
          $a = $swa['a'];
          if ($a == null) {
            $a = 'N/A';
          } else {
            $status = 'active';
          }
          $b = $swa['b'];
          if ($b == null) {
            $b = 'N/A';
          } else {
            $status = 'active';
          }
          $c = $swa['c'];
          if ($c == null) {
            $c = 'N/A';
          } else {
            $status = 'active';
          }
          $d = $swa['d'];
          if ($d == null) {
            $d = 'N/A';
          } else {
            $status = 'active';
          }
         $json[$i] = array('nev' => $nev,'a' => $a, 'b' => $b,'c' => $c, 'd' => $d, 'status' => $status);
       }
      } else {

          $json[$i] = array('nev' => $nev, 'status' => 'inactive');
       }

   $i++;
 }


header("Content-Type: text/json");
echo json_encode( $json );
 ?>
