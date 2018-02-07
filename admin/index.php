<?php require_once '../config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <title>TPMakeup</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/pnotify.custom.css">

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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js" charset="utf-8"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'.tiny' });</script>
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
    <h1 placeholder="photo"><i class="fa fa-expand"></i></h1>
    <section id="photo">
      <style media="screen">
        .fa-expand:hover {
          cursor: pointer
        }
      </style>
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
        <button type="button" class="btn btn-success" name="button" onclick="feltolt()">feltöltés</button>
      </div>
    </div>

  <div id="photo_upload">
    <h3> Új kép feltöltése:</h3>

    <input type="file" id="new_photo" onchange="hh()">
  </div>
  <table class="table table-striped table-hover">
    <thead>
      <th>Név</th>
      <th>Kategória</th>
      <th>Leírás</th>
      <th>Megtekint</th>
      <th>Szerkeszt</th>
      <th>Töröl</th>
    </thead>
    <tbody>
      <?php
      $w = "SELECT * FROM photo";
      $sw = mysqli_query($server, $w);
      while ($swa = mysqli_fetch_assoc($sw)) {
        $name = $swa['name'];
        $photo_id = $swa['photo_id'];
        $cat = $swa['cat'];
        $pat = $swa['pat'];
        $leiras = $swa['leiras'];
        ?>
        <tr id="photo_<?php echo $photo_id; ?>">
          <td class="name"><?php echo $name; ?></td>
          <td class="cat"><?php echo $cat; ?></td>
          <td class="leiras" align="center"><?php echo $leiras; ?></td>
          <td><a class="btn btn-primary" target="_blank" data-toggle="lightbox" href="../<?php echo $pat; ?>"><i class="fa fa-eye" aria-hidden="true"></a></td>
          <td><button type="button" onclick="edit('photo','<?php echo $photo_id; ?>')" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></button></td>
          <td><button type="button" onclick="torol('<?php echo $photo_id; ?>','photo','photo_id')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</section>

<script type="text/javascript">
  function edit(div, id) {
    console.log("prepearing to save");
      var name = $('#'+div+"_"+id).children(".name").attr('contenteditable','true');
      var leiras = $('#'+div+"_"+id).children(".leiras").attr('contenteditable','true');
      if (div == 'photo') {
        var cat = $('#'+div+"_"+id).children(".cat").attr('contenteditable','true');
      }
      var bt = "<td class='save'><button type='button' class='btn btn-success' onclick=save('"+div+"','"+id+"')><i class='fa fa-floppy-o' aria-hidden='true'></button></td>";
      $('#'+div+"_"+id).append(bt);
  }
  function save(div, id) {
    console.log("fetching data...");
    var tr = '#'+div+"_"+id;
    var name = $(tr).children(".name").html();
    var leiras = $(tr).children(".leiras").html();
    if (div == "photo") {
      var cat = $(tr).children(".cat").html();
      arr = new Array({'name': name, 'leiras': leiras, 'cat': cat});
    } else {
      arr = new Array({'name': name, 'leiras':leiras});

    }
    console.log(arr[0]);
    console.log("saving...");
          $.post("../ajax/ajax.update.php", {
                div: div,
                id: id,
                data: arr
                  },
                  "json").done(function( response ) {
                    if (response == "ok") {
                      new PNotify({
                        title: 'Siker',
                        text: 'Sikeresen szerkesztve!',
                        animate: { animate: true, in_class: 'bounceInLeft',
                        out_class: 'bounceOutRight',},
                        type: "success",
                        hide: true,
                      });
                      console.log('saved');
                      $(tr).children(".save").attr("hidden","hidden");
                      $(tr).children(".name").attr('contenteditable','false');
                      $(tr).children(".leiras").attr('contenteditable','false');
                      if (div == 'photo') {
                        $(tr).children(".cat").attr('contenteditable','false');
                      }
                    } else {
                new PNotify({
                  title: 'Sikertelen szerkesztés',
                  text: 'Sikertelen volt a szerkesztés! Hiba: '+response,
                  animate: { animate: true, in_class: 'bounceInLeft',
                  out_class: 'bounceOutRight',},
                  type: "error",
                  hide: true,
                });
              }

            });

  }

  function feltolt() {
    var cat = $('#photo_cat option:selected').html();
    var name = $('#photo_name').val();
    var leiras = $('#photo_leiras').val();
      $.post("../ajax/ajax.get_next_id.php", {
        table: 'photo',
        id_type: 'photo_id'
        },
        "json").done(function( response ) {
          if (response != "error") {
            console.log(response);
            var id = response[0];
          }

          // init fortm data
          var KepFile = new FormData();

          // creating path
          var kephely = "assets/uploads/kepek/" + id + ".jpg";

          // Kép hozzáadás a form data-hoz
          KepFile.append('kep', $('#new_photo').prop('files')[0]); //
          KepFile.append('path', kephely); //
          KepFile.append('name', name);
          KepFile.append('cat', cat);
          KepFile.append('leiras', leiras);
          $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: KepFile,
            url: "../ajax/ajax.kep_feltoltes.php",
            dataType: 'json',
          });
          new PNotify({
            title: 'Siker',
            text: 'Sikeresen rögzítve! Frissíts a változtatások mutatásához.',
            animate: { animate: true, in_class: 'bounceInLeft',
            out_class: 'bounceOutRight',},
            type: "success",
            hide: true,
          });
        });
  }
</script>
<style>
      .tooltip .tooltiptext {
          visibility: hidden;
          width: 120px;
          background-color: #555;
          color: #fff;
          text-align: center;
          border-radius: 6px;
          padding: 5px 0;
          position: absolute;
          z-index: 1;
          bottom: 125%;
          left: 50%;
          margin-left: -60px;
          opacity: 0;
          transition: opacity 1s;
      }

      .tooltip .tooltiptext::after {
          content: "";
          position: absolute;
          top: 100%;
          left: 50%;
          margin-left: -5px;
          border-width: 5px;
          border-style: solid;
          border-color: #555 transparent transparent transparent;
      }

      .tooltip:hover .tooltiptext {
          visibility: visible;
          opacity: 1;
      }
  </style>
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
  <h1 placeholder="kateg"><i class="fa fa-expand"></i></h1>
  <section id="kateg">

  <div class="jumbotron">
    <h3>Kategóriák feltivete</h3>
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <label>Kategória név</label>
        <input type="text" id="cat_name" class="form-control">
      </div>
      <div class="col-lg-8 col-md-8">

        <label>Kategória leírás</label>
        <textarea id="cat_leiras" data-toggle="tooltip" title="Méretezhető vagyok!" class="form-control" rows="1" cols="80"></textarea>
      </div>
      <div class="col-lg-12">
        <p></p>
        <label>Gomb színe</label>
        <input type="color" id="color" value="#fff">
        <p></p>
          <button type="button" class="btn btn-success" name="button" onclick="new_cat()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Mentés</button>

        <script type="text/javascript">
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
          });
          $('#color').on('change',function() {
          });
            function new_cat() {
              var cat_name = $('#cat_name').val();
              var cat_leiras = $('#cat_leiras').val();
              var szin = $('#color').val();
              var array = new Array({'name': cat_name, 'leiras':cat_leiras, 'color':szin});
              $.post("../ajax/ajax.insert.php", {
                  Ptable: 'categories',
                  data: array,
                },
                "json").done(function( response ) {
                  if (response == "ok") {
                    new PNotify({
                      title: 'Siker',
                      text: 'Sikeresen megtörtént a feltöltés!  Frissíts a változtatások mutatásához.',
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
        <table class="table table-striped table-hover">
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
             <tr id="cat_<?php echo $swa['cat_id'] ?>">
               <td class="name"><?php echo $swa['name'] ?></td>
               <td class="leiras" align="center"><?php echo $swa['leiras'] ?></td>
               <td><button type="button" class="btn btn-warning" name="button" onclick="edit('cat','<?php echo $id ?>')"><i class="fa fa-pencil" aria-hidden="true"></i> Szerkeszt</button>
                   <button type="button" class="btn btn-danger" name="button" onclick="torol('<?php echo $id ?>','categories','cat_id')"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button></td>
             </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</section>
<h1 placeholder="blog"><i class="fa fa-expand"></i></h1>
<section id="blog">
  <div class="container jumbotron">
    <h3>Blogbejegyzés készítése</h3>
    <label>Cím</label>
    <input type="text" id="blog_cim" class="form-control">
    <label>Szöveg</label>
    <textarea id="blog_text" rows="20" cols="80" class="form-contorl tiny"></textarea>
    <p></p>
    <button onclick="blog_ment()" class="btn btn-success">Mentés</button>
    <script type="text/javascript">
      function blog_ment() {
      var cim = $("#blog_cim").val();
      var szoveg = tinyMCE.activeEditor.getContent();

      console.log(szoveg);

      var array = new Array({'blog_cim': cim, 'szoveg':szoveg});
      $.post("../ajax/ajax.insert.php", {
          Ptable: 'blog',
          data: array,
        },
        "json").done(function( response ) {
          if (response == "ok") {
          new PNotify({
            title: 'Siker',
            text: 'Sikeresen megtörtént a feltöltés!  Frissíts a változtatások mutatásához.',
            animate: { animate: true, in_class: 'bounceInLeft',
            out_class: 'bounceOutRight',},
            type: "success",
            hide: true,
          });
        } else {
          new PNotify({
            title: 'Hiba',
            text: 'Valami nem sikerült! :(',
            animate: { animate: true, in_class: 'bounceInLeft',
            out_class: 'bounceOutRight',},
            type: "error",
            hide: true,
          });
          return;
        }
        }).fail((err) => {
          console.log(err);
          new PNotify({
            title: 'Hiba',
            text: 'Valami nem sikerült! :(',
            animate: { animate: true, in_class: 'bounceInLeft',
            out_class: 'bounceOutRight',},
            type: "error",
            hide: true,
          });
        });

      }
    </script>
  </div>
</section>
<h1 placeholder="arlista"><i class="fa fa-expand"></i></h1>
<section id="arlista">

  <div class="container jumbotron">
    <h3>Árlista:</h3>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <label>Listaelem megnevezése</label>
        <input type="text" id="ar_megnevezes" class="form-control">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <label>Listaelem ára</label>
        <input type="text" id="ar_ar" class="form-control">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <label>Adatok elmentése</label>
        <button type="button" class="btn btn-success form-control" onclick="ar_ment()">Mentés</button>
      </div>
      <script type="text/javascript">
        function ar_ment() {
          var megn = $('#ar_megnevezes').val();
          var ar = $('#ar_ar').val();
          var array = new Array({'megnevezes': megn, 'ar':ar});
          $.post("../ajax/ajax.insert.php", {
              Ptable: 'arlista',
              data: array,
            },
            "json").done(function( response ) {
              if (response == "ok") {
                new PNotify({
                  title: 'Siker',
                  text: 'Sikeresen megtörtént a feltöltés!  Frissíts a változtatások mutatásához.',
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
    <table class="table table-striped table-hover">
      <thead>
        <th>Megnevezés</th>
        <th>Ár</th>
        <th>Törlés</th>
      </thead>
      <tbody>
        <?php
        $w = "SELECT * FROM arlista";
        $sw = mysqli_query($server, $w);
        while ($swa = mysqli_fetch_assoc($sw)) {
          $id = $swa['ar_id'];
         ?>
         <tr id="ar_<?php echo $id ?>">
           <td class="megvevezes"><?php echo $swa['megnevezes'] ?></td>
           <td class="ar" align="center"><?php echo $swa['ar'] ?></td>
           <td><button type="button" class="btn btn-danger form-control" name="button" onclick="torol('<?php echo $id ?>','arlista','ar_id')"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button></td>
         </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  </section>
</div>
<script type="text/javascript">
  function torol(id,table,id_name) {
    $.post("../ajax/ajax.delete.php", {
        table: table,
        id_name: id_name,
        id: id
      },
      "json").done(function( response ) {
        if (response == "ok") {
          new PNotify({
            title: 'Siker',
            text: 'Sikeresen Töröltem! Frissíts a változtatások mutatásához.',
            animate: { animate: true, in_class: 'bounceInLeft',
            out_class: 'bounceOutRight',},
            type: "success",
            hide: true,
          });
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
<script type="text/javascript">
    $(".fa-expand").on('click', function() {
    var section = $(this).parents('h1').attr("placeholder");
    $('#'+section).slideToggle(1200);
  });
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });
</script>
  </body>

</html>
