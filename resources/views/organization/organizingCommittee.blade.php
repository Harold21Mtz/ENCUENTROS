@include('include.header');

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">


            <h2 style="color: #0D47A1;">Organizing Committee</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="team" class="team">
        <div class="container">
            <br>

            @if(count($organizingscommitee) > 0)
                @foreach($organizingscommitee as $organizingcommitee)
                    @if($organizingcommitee->status == 1)
                        <div class="row" style="gap: 5px;">
                            <div class="col-lg-12 col-md-6 ">

                                <h4 style="margin-bottom:0px;cursor:pointer" data-toggle="modal"
                                    data-target="#showmodal{{$organizingcommitee->id}}">{{$organizingcommitee->organizer_charge}}
                                    <br>{{$organizingcommitee->organizer_name}}
                                    , {{$organizingcommitee->organizer_title}}</h4>
                                <i class="icofont-circled-right"
                                   style="color: #0D47A1;margin-left:15px"></i> {{$organizingcommitee->organizer_university}}
                                <!-- Modal -->
                                <div class="modal fade" id="showmodal{{$organizingcommitee->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h5 class="modal-title"
                                                    id="label">{{$organizingcommitee->organizer_charge}}
                                                    <br>{{$organizingcommitee->organizer_name}}
                                                    , {{$organizingcommitee->organizer_title}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{$organizingcommitee->organizer_description}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>
                    @endif
                @endforeach
            @else
                <p style="margin-bottom: 3%">
                    No organizing committee recorded
                </p>
            @endif


        </div>


    </section><!-- End Team Section -->

    <section id="testimonials" class="testimonials" style="margin-top: 10px;">
        <div class="container">

            <div class="section-title">
                <h2>Organizing Entity</h2>
            </div>

            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item text-center">
                        <img src="https://ufpso.edu.co/images/identidadcorporativa/logoVertical.png" width="200px">


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item text-center">
                        <img src="https://eventos.ufpso.edu.co/VIII_ENCUENTRO/assets/img/LogoFacultad.jpeg"
                             width="250px">
                    </div>
                </div>

            </div>


        </div>
    </section><!-- End Testimonials Section -->
    <section id="clients" class="clients" style="margin-bottom: 20px; margin-top: 10px;">
        <div class="container">

            <div class="section-title">
                <h2> They support</h2>
            </div>
            @if(count($organizings) > 0)
                <div class="owl-carousel clients-carousel">
                    @foreach($organizings as $organizing)
                        <img src="{{ asset('uploads/organizing/' . $organizing->organizing_image) }}" alt="">
                    @endforeach
                </div>
            @endif


        </div>
    </section><!-- End Clients Section -->
</main><!-- End #main -->
@include('include.footer2')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap JS (Popper.js y Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Owl Carousel JS -->
<script src="ruta/a/owl.carousel.min.js"></script>
