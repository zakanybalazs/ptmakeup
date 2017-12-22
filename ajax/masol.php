<?php
require_once '../config/db.php';
 $server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
 $json  = array();
 $q = "SELECT nev_id, nevek, kirendeltseg FROM vendegek";
 $sq = mysqli_query($server,$q);
 while ($sqa = mysqli_fetch_assoc($sq)) {
   $id = $sqa['nev_id'];
   $nev = $sqa['nevek'];
   $kir = $sqa['kirendeltseg'];
   echo "$id $nev $kir \n";
   $w = "INSERT INTO nevek (nevek_id, nev, kirendeltseg) VALUES ('{$id}','{$nev}','{$kir}')";
   $sw = mysqli_query($server, $q);
}

 ?>
</body>
</html>
