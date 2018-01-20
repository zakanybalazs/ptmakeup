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

    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
      <div class="container">
        <div class="content-section-heading text-center">
          <h3 class="text-primary mb-0">Portfolio</h3>
          <h2 class="mb-5">(kiválaszott kategória</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="portfolio-item" data-toggle="lightbox" href="img/portfolio-1.jpg">
              <span class="caption">
                <span class="caption-content">
                  <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                </span>
              </span>
              <img class="img-fluid" src="img/portfolio-1.jpg" alt="">
            </a>
          </div>

        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white" href="#">
              <i class="icon-social-github"></i>
            </a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; Your Website 2017</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


    <!-- image view model -->
    <script type="text/javascript">
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });
    </script>

  </body>

</html>
