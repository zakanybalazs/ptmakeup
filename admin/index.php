<?php require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <title>PTMakeup</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/pnotify.custom.css">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.min.css" rel="stylesheet">

    <title></title>
    <style media="screen">
      .jumbotron {
        box-shadow: 4px 4px 12px #888888;
      }
    </style>
  </head>
  <!-- db AQ1sw2de3 -->
  <body style="backgroung-color:black">
    <div class="container">
    <div class="jumbotron">
    <h2 align="center">Üdvözöllek az admin felületeden!</h2>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="photo_details">
        <h3>Kép adatai:</h3>
        <label>Kép neve</label>
        <input type="text" class="form-control" id="photo_name">
        <p></p>
        <label>Leírás</label>
        <textarea id="photo_leiras" class="form-control" rows="6" cols="60"></textarea>
        <p></p>
        <select class="form-control" id="photo_cat">
          <?php
          $q = "SELECT * FROM categories";
          $sq = mysqli_query($server, $q);
          while ($sqa = mysqli_fetch_assoc($sq)) {?>
            <option value="<?php echo $sqa['cat_id']; ?>"><?php echo $sqa['name']; ?></option>
          <?php } ?>
        </select>
        <p></p>
        <button type="button" class="btn btn-success" name="button">feltöltés</button>
      </div>
    </div>

  <div id="photo_upload">
    <h3>Új kép feltöltése:</h3>
    <input type="file" id="new_photo" onchange="hh()">
  </div>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#photo_details').hide();
    });
      function hh() {
        $('#photo_upload').slideUp(1200);
        $('#photo_details').slideDown(1200);
      }

    </script>
  </div>
  <div class="jumbotron">
    <h3>Kategóriák feltivete</h3>
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <label>Kategória név</label>
        <input type="text" id="cat_name" class="form-control">
      </div>
      <div class="col-lg-8 col-md-8">

        <label>Kategória leírás</label>
        <textarea id="cat_leiras" class="form-control" rows="8" cols="80"></textarea>
      </div>
      <div class="col-lg-12">
          <button type="button" class="btn btn-success" name="button" onclick="new_cat()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Mentés</button>
          <script type="text/javascript">
            function new_cat() {
              var cat_name = $('#cat_name').val();
              var cat_leiras = $('#cat_leiras').val();
              var array = new Array({'name': cat_name, 'leiras':cat_leiras});
              $.post("../ajax/ajax.insert.php", {
                  Ptable: 'categories',
                  data: array,
                },
                "json").done(function( response ) {
                  if (response == "ok") {
                    new PNotify({
                      title: 'Siker',
                      text: 'Sikeresen megtörtént a feltöltés!',
                      animate: { animate: true, in_class: 'bounceInLeft',
                      out_class: 'bounceOutRight',},
                      type: "success",
                      hide: true,
                    });
                  }
                });
            }
          </script>
      </div>
      <div class="col-lg-12">
        <h3>Kategóriák:</h3>
        <table class="table table-stripped table-hover">
          <thead>
            <th>Név</th>
            <th>Leírás</th>
            <th>kezelés</th>
          </thead>
          <tbody>
            <?php
            $w = "SELECT * FROM categories";
            $sw = mysqli_query($server, $w);
            while ($swa = mysqli_fetch_assoc($sw)) {
              $id = $swa['cat_id'];
             ?>
             <tr id="tr_<?php echo $swa['cat_id'] ?>">
               <td><?php echo $swa['name'] ?></td>
               <td><?php echo $swa['leiras'] ?></td>
               <td><button type="button" class="btn btn-danger form-control" name="button" onclick="torol('<?php echo $id ?>')">törlés</button></td>
             </tr>
            <?php } ?>
          </tbody>
        </table>
        <script type="text/javascript">
          function torol(id) {
            alert('torlés');
            $.post("../ajax/ajax.delete.php", {
                table: 'categories',
                id_name: 'cat_id',
                id: id
              },
              "json").done(function( response ) {
                if (response == "ok") {
                  new PNotify({
                    title: 'Siker',
                    text: 'Sikeresen Töröltem!',
                    animate: { animate: true, in_class: 'bounceInLeft',
                    out_class: 'bounceOutRight',},
                    type: "success",
                    hide: true,
                  });
                  $("#tr_"+id).slideUp(1200);
                } else {
            new PNotify({
              title: 'Sikertelen tölrés',
              text: 'Sikertelen volt a törlés! Hiba: '+response,
              animate: { animate: true, in_class: 'bounceInLeft',
              out_class: 'bounceOutRight',},
              type: "error",
              hide: true,
            });
          }

        });

          }
        </script>
      </div>
    </div>
  </div>
</div>
  </body>
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/stylish-portfolio.min.js"></script>
  <script src="../assets/js/pnotify.custom.js" charset="utf-8"></script>
  <script src="../assets/js/pnotify.custom.js" charset="utf-8"></script>
  <script src="../assets/js/scrollTo.min.js" charset="utf-8"></script>

</html>
