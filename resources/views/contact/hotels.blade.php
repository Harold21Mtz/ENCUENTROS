@include('include.header')

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">


            <h2 style="color: #0D47A1;">Hotels</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="about" class="about" style="margin-bottom: 10px;">
        <div class="container">

            @if(count($hotels) > 0)
                @foreach($hotels as $hotel)
                    <div class="row">
                        <div class="col-lg-6 pt-4 pt-lg-0 content">

                            <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
                                <div class="carousel-inner boderRedondo">
                                    @if($hotel->hotel_image)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100"
                                                 src="{{ asset('storage/' . $hotel->hotel_image) }}"
                                                 alt="First slide">
                                        </div>
                                    @endif
                                    @if($hotel->hotel_image_secondary_one)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100"
                                                 src="{{ asset('storage/' . $hotel->hotel_image_secondary_one) }}"
                                                 alt="First slide">
                                        </div>
                                    @endif
                                    @if($hotel->hotel_image_secondary_two)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100"
                                                 src="{{ asset('storage/' . $hotel->hotel_image_secondary_two) }}"
                                                 alt="First slide">
                                        </div>
                                    @endif
                                    @if($hotel->hotel_image_secondary_three)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100"
                                                 src="{{ asset('storage/' . $hotel->hotel_image_secondary_three) }}"
                                                 alt="First slide">
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">

                            <h3>{{ $hotel->hotel_name }}</h3>
                            <p class="font-italic text-justify">
                            {{$hotel->hotel_description}}
                            <h4>¡We speak your language!</h4>
                            Contact us<br>
                            <i style="font-size: 22px;"
                               class="icofont-phone-circle"></i>{{ $hotel->hotel_contact_number }}<br>
                            @if($hotel->hotel_contact_email)
                                <i style="font-size: 22px;" class="icofont-email"></i> <a
                                    href="mailto:{{$hotel->hotel_contact_email}}">{{$hotel->hotel_contact_email}}</a>
                                @endif

                                </p>
                                </p>


                        </div>

                        <div class="col-lg-12 pt-4 pt-lg-0 content" style="margin-top: 5px; margin-bottom: 10px">
                            <h2 style="color: #0D47A1;">Location</h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1356.3231499463104!2d-73.35617591698201!3d8.235680535554916!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3291d878aae0d5!2sHotel%20Tarigua%20Oca%C3%B1a!5e0!3m2!1ses-419!2sco!4v1600355459312!5m2!1ses-419!2sco"
                                frameborder="0" style="border:0; width: 100%; height: 300px;"
                                allowfullscreen></iframe>
                        </div>
                        @endforeach
                        @else
                            <p>
                                No hay hoteles registrados
                            </p>
                        @endif
                    </div>

    </section><!-- End About Section -->
</main><!-- End #main -->

@include('include.footer2')
