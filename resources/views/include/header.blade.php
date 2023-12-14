<!DOCTYPE html>
<html lang="en">
@foreach ($slides as $slide)
<title>{{$slide->conference_name}}</title>
@endforeach
<head>
    @section('metadata')
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="Content-Language" content="en_US"/>
        @foreach ($slides as $slide)
        <meta content="{{$slide->conference_name}}" name="description">
        @endforeach
        <meta content="Technological,Innovation,Conference" name="keywords">
    @stop
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
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
<button type="button" class="mobile-nav-toggle d-lg-none" id="loginButton">
    <i class="icofont-navigation-menu"></i>
</button>

<script>
    document.getElementById("loginButton").addEventListener("click", function () {
        window.location.href = "{{ route('login') }}";
    });
</script>

<!-- Header -->
<header id="header" style="height: 100px !important;">
    <div class="container d-flex">
        <div class="logo mr-auto">
            @foreach ($slides as $slide)
                @if(isset($slide) && $slide->status == 1)
                    <a href="{{ route('login') }}">
                    <span>
                        <img src="{{ asset('uploads/slides/logo/' . $slide->conference_logo) }}"
                             style="max-height: 80px !important;" height="80" alt="">
                    </span>
                    </a>
                @endif
            @endforeach
        </div>


        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li class="drop-down"><a href="#">About</a>
                    <ul>
                        <li class="drop-down"><a href="#">Organization</a>
                            <ul>
                                <li><a href="{{ route('organizingCommittee') }}">Organizing Committee</a></li>
                                <li><a href="{{ route('scientificCommitteeN') }}">Scientific Committee National</a>
                                </li>
                                <li><a href="{{ route('scientificCommitteeI') }}">Scientific Committee
                                        International</a></li>

                            </ul>
                        </li>
                        <li class="drop-down"><a href="#">Previous Editions</a>
                            <ul>
                                <li>
                                    <a href="https://www.acofi.edu.co/eventos/iii-encuentro-internacional-de-innovacion-tecnologica/"
                                       target="_blank">3th International Conference Of Technological Innovation</a>
                                </li>
                                <li>
                                    <a href="https://www.acofi.edu.co/eventos/iv-encuentro-internacional-de-innovacion-tecnologica/"
                                       target="_blank">4th International Conference Of Technological Innovation</a>
                                </li>
                                <li><a href="https://eventos.ufpso.edu.co/V_ENCUENTRO/" target="_blank">5th
                                        International Conference Of Technological Innovation</a></li>
                                <li><a href="https://eventos.ufpso.edu.co/VI_ENCUENTRO/" target="_blank">6th
                                        International Conference Of Technological Innovation</a></li>
                                <li><a href="https://eventos.ufpso.edu.co/VII_ENCUENTRO/" target="_blank">7th
                                        International Conference Of Technological Innovation</a></li>
                                <li><a href="https://eventos.ufpso.edu.co/VIII_ENCUENTRO/" target="_blank">8th
                                        International Conference Of Technological Innovation</a></li>
                                <li><a href="https://eventos.ufpso.edu.co/IX_ENCUENTRO/" target="_blank">9th
                                        International Conference Of Technological Innovation</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="drop-down"><a href="#">Program</a>
                    <ul>
                        <li><a href="{{ route('scientificProgram') }}">Scientific Program</a></li>
                        <li><a href="{{ route('speakers') }}">Speakers</a></li>
                        <li><a href="{{ route('socialEvents') }}">Social Events</a></li>
                        <li class="drop-down"><a href="#">Systems Engineering Workshop</a>
                            <ul>
                                <li><a href="{{ route('scientificProgramS') }}">Scientific Program</a></li>
                                <li><a href="{{ route('workshopParticipants') }}">Workshop Participants</a></li>


                            </ul>
                        </li>


                    </ul>
                </li>

                <li><a href="{{ route('registration') }}">Registration</a></li>
                <li class="drop-down"><a href="#">Authors' Area</a>
                    <ul>
                        <li><a href="{{ route('importantDates') }}">Important Dates</a></li>
                        <li><a href="{{ route('abstractSubmission') }}">Abstract Submission</a></li>

                        <li><a href="{{ route('instructionsAuthors') }}">Instructions for Authors</a></li>
                        <li><a href="{{ route('thematicAreas') }}">Topics</a></li>
                        <li><a href="{{ route('publishingOptions') }}">Publishing Options</a></li>

                    </ul>
                </li>
                <li class="mobile-nav-hide"><a href="{{ route('contact') }}">Contact Us</a></li>
                <li class="mobile-nav-hide"><a href="{{ route('hotels') }}">Hotels</a></li>
                <li class="mobile-nav-hide"><a href="assets/formatos/MemoriasEncuentroIngenierias2023.pdf"
                                               target="_blank">Memories</a></li>


                @if(session('login'))
                    @php Session::forget('login') @endphp
                    <script>
                        $('#form-login').removeClass('d-none')
                    </script>
                @endif
            </ul>
        </nav><!-- .nav-menu -->
    </div>


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
    <section id="about" class="about" style="background: url(assets/img/fondo.jpg); border-radius: 20px;">
        <div id="google_translate_element" style="margin-top:10px"></div>
        <div style="padding: 40px;">
            <div class="row">
                @foreach($slides as $slide)
                    <div
                        class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 aos-init aos-animate"
                        data-aos="fade-up" data-aos-delay="200">

                        @php
                            $parts = explode(' of ', $slide->conference_name, 2);
                            $firstPart = $parts[0];
                            $secondPart = isset($parts[1]) ? 'of ' . $parts[1] : '';
                        @endphp

                        <h1 style="color: #0D47A1;" class="text-center font-weight-bold">
                            {{ $firstPart }}
                            <p style="color: red;">{{ $secondPart }}</p>
                        </h1>

                        <h3 style="color: #e20816; font-family:'Open Sans', sans-serif"
                            class="text-center font-weight-bold">
                            <hr style="margin-bottom: 0rem;"> {{$slide->conference_date}}
                        </h3>
                        <h5 class="text-center font-weight-bold">{{$slide->university_name}}</h5>
                        <h5 class="text-center font-weight-bold"><i>{{$slide->faculty_name}}</i></h5>
                    </div>
                @endforeach

                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner boderRedondo">
                            @foreach(File::files(public_path('uploads/slides')) as $key => $file)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{ asset('uploads/slides/' . basename($file)) }}"
                                         alt="Slide Image {{ $key }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
</main>
</body>

</html>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,es',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');

        // Añade un evento para mostrar el botón de traducción cuando las traducciones estén cargadas
        google.translate.isLoaded || google.translate.load({
            showIcon: true,
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        });
    }
</script>

<script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<style>
    #google_translate_element {
        margin-top: 10px;
        display: flex;
        align-items: center;
    }

    .goog-te-combo {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
        margin-right: 5px;
    }

    .goog-te-combo option {
        padding: 5px;
    }
</style>
