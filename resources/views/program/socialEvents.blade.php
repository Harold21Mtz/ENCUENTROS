@include('include.header')

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">


            <h2 style="color: #0D47A1;">Social Events </h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container">

            <div class="row">


                @if(count($events) > 0)
                    @foreach($events as $event)
                        @if($event->status == 1)

                                <div class="col-lg-6 pt-4 pt-lg-0 content" style="margin-top:30px;">
                                    <h3>{{$event->event_title}}</h3>
                                    <p class="font-italic text-justify">
                                        {{$event->event_description_one}}
                                        <br><br>
                                        {{$event->event_description_two}}
                                    </p>
                                </div>

{{--                            <h3>{{$event->event_title}}</h3>--}}
{{--                            <p class="font-italic text-justify">--}}
{{--                                {{$event->event_description_one}}--}}
{{--                                <br><br>--}}
{{--                                {{$event->event_description_two}}--}}
{{--                            </p>--}}

                            <div class="col-lg-6 pt-4 pt-lg-0 content">

                                <div id="carouselExampleSlidesOnly" class="carousel slide carouselExampleSlidesOnly"
                                     data-ride="carousel">
                                    <div class="carousel-inner boderRedondo" style="margin-top: -104%">

                                        @if($event->event_image)
                                            <div class="carousel-item active">
                                                <img class="d-block w-100"
                                                     src="{{ asset('uploads/socialEvents/' . $event->event_image) }}"
                                                     alt="First slide">
                                                <div class="carousel-caption d-none d-md-block">

                                                </div>
                                            </div>
                                        @endif

                                        @if($event->event_image_one)
                                            <div class="carousel-item">
                                                <img class="d-block w-100"
                                                     src="{{ asset('uploads/socialEvents/' . $event->event_image_one) }}"
                                                     alt="Second slide">
                                                <div class="carousel-caption d-none d-md-block">

                                                </div>
                                            </div>
                                            @endif
                                            @if($event->event_image_two)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100"
                                                         src="{{ asset('uploads/socialEvents/' . $event->event_image_two) }}"
                                                         alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">

                                                    </div>
                                                </div>
                                            @endif
                                            @if($event->event_image_three)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100"
                                                         src="{{ asset('uploads/socialEvents/' . $event->event_image_three) }}"
                                                         alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">

                                                    </div>
                                                </div>
                                            @endif

                                            @if($event->event_image_four)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100"
                                                         src="{{ asset('uploads/socialEvents/' . $event->event_image_four) }}"
                                                         alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">

                                                    </div>
                                                </div>
                                            @endif
                                            @if($event->event_image_five)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100"
                                                         src="{{ asset('uploads/socialEvents/' . $event->event_image_five) }}"
                                                         alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">

                                                    </div>
                                                </div>
                                            @endif
                                            @if($event->event_image_six)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100"
                                                         src="{{ asset('uploads/socialEvents/' . $event->event_image_six) }}"
                                                         alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">

                                                    </div>
                                                </div>
                                            @endif
                                            @if($event->event_image_seven)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100"
                                                         src="{{ asset('uploads/socialEvents/' . $event->event_image_seven) }}"
                                                         alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">

                                                    </div>
                                                </div>
                                            @endif
                                            @if($event->event_image_eight)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100"
                                                         src="{{ asset('uploads/socialEvents/' . $event->event_image_eight) }}"
                                                         alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">

                                                    </div>
                                                </div>
                                            @endif

                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
            </div>
            @else
                <p style="margin-bottom: 3%">
                    No social events registered
                </p>
            @endif
        </div>

        </div>
    </section><!-- End About Section -->
</main><!-- End #main -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    $('.carouselExampleSlidesOnly').carousel({
        interval: 1500
    });
</script>
@include('include.footer2')
