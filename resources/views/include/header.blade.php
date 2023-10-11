<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Language" content="en_US" />
  <title>10th International Conference Of Technological Innovation</title>
  <meta content="9th International Conference Of Technological Innovation" name="descriptison">
  <meta content="Technological,Innovation,Conference" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

</head>

<body>

  <div class="social2">
    <a class="btn btn-primary mb-1" style="background-color: #3b5998;border-color: #3b5998" href="https://www.facebook.com/VIII-Encuentro-Internacional-de-Innovaci%C3%B3n-Tecnol%C3%B3gica-104886368050738" target="_blank" role="button"><i class="bx bxl-facebook"></i></a>

    <a class="btn btn-primary mb-1" style="background-color: #55acee;border-color: #55acee;" href="https://twitter.com/EiitVii" target="_blank" role="button"><i class="bx bxl-twitter"></i></a>

    <a class="btn btn-primary" style="background-color: #dd4b39;border-color: #dd4b39;" href="mailto:encuentrointit@ufpso.edu.co" role="button"><i class="bx bx-mail-send"></i></a>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" style="height: 100px !important;">

    <div class="container d-flex">

      <div class="logo mr-auto">
        <a href="index.php"><span><img src="assets/img/logo.jpg" style="max-height: 80px !important;" height="80"></span></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>

          <li class="drop-down"><a href="#">About</a>
            <ul>
              <li class="drop-down"><a href="#">Organization</a>
                <ul>
                  <li><a href="{{ route('organizingCommittee')}}">Organizing Committee</a></li>
                  <li><a href="{{ route('scientificCommitteeN')}}">Scientific Committee National</a></li>
                  <li><a href="{{ route('scientificCommitteeI')}}">Scientific Committee International</a></li>

                </ul>
              </li>
              <li class="drop-down"><a href="#">Previous Editions</a>
                <ul>
                  <li><a href="https://www.acofi.edu.co/eventos/iii-encuentro-internacional-de-innovacion-tecnologica/" target="_blank">3th International Conference Of Technological Innovation</a></li>
                  <li><a href="https://www.acofi.edu.co/eventos/iv-encuentro-internacional-de-innovacion-tecnologica/" target="_blank">4th International Conference Of Technological Innovation</a></li>
                  <li><a href="https://eventos.ufpso.edu.co/V_ENCUENTRO/" target="_blank">5th International Conference Of Technological Innovation</a></li>
                  <li><a href="https://eventos.ufpso.edu.co/VI_ENCUENTRO/" target="_blank">6th International Conference Of Technological Innovation</a></li>
                  <li><a href="https://eventos.ufpso.edu.co/VII_ENCUENTRO/" target="_blank">7th International Conference Of Technological Innovation</a></li>
                  <li><a href="https://eventos.ufpso.edu.co/VIII_ENCUENTRO/" target="_blank">8th International Conference Of Technological Innovation</a></li>
                  <li><a href="https://eventos.ufpso.edu.co/IX_ENCUENTRO/" target="_blank">9th International Conference Of Technological Innovation</a></li>
                </ul>
              </li>

            </ul>
          </li>
          <li class="drop-down"><a href="#">Program</a>
            <ul>
              <li><a href="{{ route ('scientificProgram') }}">Scientific Program</a></li>
              <li><a href="{{ route ('speakers') }}">Speakers</a></li>
              <li><a href="{{ route ('socialEvents')}}">Social Events</a></li>
              <li class="drop-down"><a href="#">Systems Engineering Workshop</a>
                <ul>
                  <li><a href="{{ route ('scientificProgramS')}}">Scientific Program</a></li>
                  <li><a href="{{( route ('workshopParticipants'))}}">Workshop Participants</a></li> 
                 
                  
                </ul>
              </li>



            </ul>
          </li>

          <li><a href="{{route ('registration')}}">Registration</a></li>
          <li class="drop-down"><a href="#">Authors' Area</a>
            <ul>
              <li><a href="{{route ('importantDates')}}">Important Dates</a></li>
              <li><a href="{{route ('abstractSubmission')}}">Abstract Submission</a></li>

              <li><a href="{{route ('instructionsAuthors')}}">Instructions for Authors</a></li>
              <li><a href="{{route ('thematicAreas')}}">Topics</a></li>
              <li><a href="{{route ('publishingOptions')}}">Publishing Options</a></li>

            </ul>
          </li>
          <li><a href="{{route ('contact')}}">Contact Us</a></li>
          <li><a href="{{ route('hotels') }}">Hotels</a></li>
          <li><a href="#">Memories</a></li>
          <!--<li><a href="assets/formatos/MemoriasEncuentroIngenierias2022.pdf" target="_blank" >Memories</a></li>-->

        </ul>

        <script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({
              pageLanguage: 'en',
              includedLanguages: 'en,es',
              layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
          }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

      </nav><!-- .nav-menu -->

    </div>
    <div id="google_translate_element" style="margin-top:10px"></div>
  </header><!-- End Header -->

  <div class="modal fade" id="Memories" tabindex="-1" role="dialog" aria-labelledby="Memories" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Memories">Memories</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          The event has not yet started
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>


  <main id="main">
    <section id="about" class="about" style="background: url(assets/img/fondo.jpg);  min-height: 500px ;">
      <div style="padding: 40px;">

        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

            <h1 style="color: #0D47A1;" class="text-center font-weight-bold">10th International Conference Of Technological Innovation</h1>
            <h3 style="color: #e20816;font-family:'Times New Roman', Times, serif" class="text-center font-weight-bold">
              <hr style="margin-bottom: 0rem;"> 11-13 october, 2023
            </h3>
            <h5 class="text-center font-weight-bold">Universidad Francisco de Paula Santander Ocaña - Colombia</h5>
            <h5 class="text-center font-weight-bold"><i>Faculty of Engineering</i></h5>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">

              <div class="carousel-inner boderRedondo">


                <div class="carousel-item active">
                  <img class="d-block w-100" src="assets/img/slide/slide-5.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">


                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/slide/slide-2.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">


                  </div>
                </div>



                <div class="carousel-item ">
                  <img class="d-block w-100" src="assets/img/slide/slide-1.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">


                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/slide/slide-4.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">


                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/slide/slide-6.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">


                  </div>
                </div>




              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->