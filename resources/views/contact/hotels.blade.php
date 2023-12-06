@include('include.header')

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">
            <h2 style="color: #0D47A1;">Hotels</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="about" class="about" style="margin-bottom: 10px; margin-top: 30px">
        <div class="container">

            @if(count($hotels) > 0)
            <div class="row">
                @foreach($hotels as $hotel)
                <div class="col-lg-6 pt-4 pt-lg-0 content">

                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner boderRedondo">
                            @if($hotel->hotel_image)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('uploads/hotels/' . $hotel->hotel_image) }}" alt="First slide">
                            </div>
                            @endif
                            @if($hotel->hotel_image_secondary_one)
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('uploads/hotels/' . $hotel->hotel_image_secondary_one) }}" alt="Second slide">
                            </div>
                            @endif
                            @if($hotel->hotel_image_secondary_two)
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('uploads/hotels/' . $hotel->hotel_image_secondary_two) }}" alt="Third slide">
                            </div>
                            @endif
                            @if($hotel->hotel_image_secondary_three)
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('uploads/hotels/' . $hotel->hotel_image_secondary_three) }}" alt="Fourth slide">
                            </div>
                            @endif
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">

                    <h3>{{ $hotel->hotel_name }}</h3>
                    <p class="font-italic text-justify">
                        {{$hotel->hotel_description}}
                    </p>
                    <h4>¡We speak your language!</h4>
                    Contact us<br>
                    <i style="font-size: 22px;" class="icofont-phone-circle"></i>{{ $hotel->hotel_contact_number }}<br>
                    @if($hotel->hotel_contact_email)
                    <i style="font-size: 22px;" class="icofont-email"></i> <a href="mailto:{{$hotel->hotel_contact_email}}">{{$hotel->hotel_contact_email}}</a>
                    @endif
                </div>

                <div class="col-lg-12 pt-4 pt-lg-0 content" style="margin-top: 5px; margin-bottom: 30px">
                    <h2 style="color: #0D47A1;">Location</h2>
                    <iframe src="{{$hotel->hotel_location}}" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen loading="lazy"></iframe>
                </div>
                @endforeach
            </div>
            @else
            <p>
                There are no registered hotels
            </p>
            @endif
        </div>

    </section><!-- End About Section -->
</main><!-- End #main -->

@include('include.footer2')
