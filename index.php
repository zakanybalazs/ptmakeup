<?php
require_once 'config/db.php';
$server = mysqli_connect($hostDB,$userDB,$passDB,$tableDB);
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TP Makeup</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/uploads/tp_icon.png" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>


    <script src="btn_ready.js" charset="utf-8"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js" charset="utf-8"></script>


    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <style media="screen">
      .sdw {
         text-shadow: 2px 2px 4px #000000;
      }

    </style>
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#page-top">Kezdőlap</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#gallery">Gelléria</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#services">Services</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#contact">Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <style media="screen">
          .wh {
            color: #fff;
          }
        </style>
        <h1 class="mb-1 wh sdw">PT Makeup</h1>
        <h3 class="mb-5 wh">
          <em class="sdw">Because we actually know how to do stuff</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#gallery">Nézd meg mit tudunk!</a>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="gallery">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto" id="color_btn">
            <h2>Nézd meg a kategóriák közül ami tetszik!</h2>
            <p></p>
            <?php
            $q = "SELECT * FROM categories";
            $sq = mysqli_query($server, $q);
            while ($sqa = mysqli_fetch_assoc($sq)) {
              $id = $sqa['cat_id'];
             ?>
            <a class="btn btn-dark btn-xl" href="galeries.php?cat=<?php echo $id ?>"><span class="sdw"><?php echo $sqa['name'] ?></span></a>
          <?php } ?>
          </div>
          <script type="text/javascript">
            $(document).ready(function() {
              btn_color();
            });
            </script>
        </div>
      </div>
    </section>



    <!-- Services -->
    <section class="content-section bg-primary text-white text-center" id="services">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Bemutatkozás</h3>
          <h2 class="mb-5">Takács Petra Annamária</h2>
        </div>
        <div class="container">
          <p>Egészen kis korom óta érdekelt minden, ami a "női kenceficék" világához köthető, ám a sminkes diplomámat csak nemrég szereztem meg a Glamour Makeup Academy kiváló képzésén. Célom nem csak az, hogy gyönyörű sminkek készítésével hozzájáruljak egy-egy különleges alkalom fényéhez, hanem, hogy személyre szabott tanácsadásaimmal megmutassam, hogy a bőrápolás, a smink és saját pozitív tulajdonságainak kiemelése nem bűnös dolog, sőt mi több, nagyban hozzájárul önbizalmunk növeléséhez. Hiszem, hogy minden nőben van valami szép!</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-2 col-sm-1"> </div>
          <div class="col-lg-6 col-md-8 col-sm-10">
          <a class="portfolio-item" data-toggle="lightbox" href="assets/uploads/petra.jpg">
            <span class="caption">
              <span class="caption-content">
                <p class="mb-0"></p>
              </span>
            </span>
            <img class="img-fluid" src="assets/uploads/petra.jpg" alt="" height="50%">
          </a>
        </div>
      </div>
      </div>
    </section>


    <!-- - Kapcsolat: ide a telefonszám (+36 20 551 7754) és az emasil kerüljön cs (tpmakeup.smink@gmail.com), illetve a facebook (https://www.facebook.com/TakacsPetraSmink/) illetve az instagram olalam (https://www.instagram.com/petra.takacs/)
    Cím nem kell!
    A facebook oldalamra és az instagarmomra is lehessen linkként rákattintani.
    -->

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container" align="left">
        <h4>Árlista:</h4>
        <?php
        $q = "SELECT * FROM arlista";
        $sq = mysqli_query($server, $q);
        while ($sqa = mysqli_fetch_assoc($sq)) {
        ?>
        <p><?php echo $sqa['megnevezes'] ?>: <?php echo $sqa['ar'] ?></p>
          <?php
        }
         ?>
      </div>
      <div class="container">
        <p>Telefon: +36 20 551 7754</p>
        <p>Email: tpmakeup.smink@gmail.com</p>
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/TakacsPetraSmink/">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/_tp_makeup_/">
              <i class="icon-social-instagram"></i>
            </a>
          </li>
        </ul>

        <p class="text-muted small mb-0">Copyright &copy; <h4><a href="https://www.facebook.com/balazs.zakany"><span style="color:#f442f4">Z</span><span style="color:#30ff75">K</span><span style="color:#82fff2">N</span><span style="color:#f7ffbf">Y</span></a></h4></p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


    <script type="text/javascript">
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox();
        });
    </script>
  </body>

</html>
