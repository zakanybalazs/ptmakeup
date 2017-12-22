<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
require_once '../config/db.php';
require_once '../phpqrcode/qrlib.php';
 $server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
 $json  = array();
 $q = "SELECT nev_id,nevek FROM vendegek";
 $sq = mysqli_query($server,$q);
 $i = 0;
 while ($sqa = mysqli_fetch_assoc($sq)) {
   echo '<p><a href="'.'qr/qr'.$sqa['nev_id'].'.png'.'">qr for id = '.$sqa['nev_id'].'</a></p>';
   QRcode::png('myviapan.com/kari/index.php?id='.$sqa['nev_id'], 'qr/'.$sqa['nevek'].$sqa['nev_id'].'.png',"QR_ECLEVEL_L",12); // creates file
}

 ?>
</body>
</html>
