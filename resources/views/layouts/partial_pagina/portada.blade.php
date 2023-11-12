<!-- ======= Hero Section ======= -->
@foreach ($portadas as $portada)
    <section id="hero" class="hero d-flex align-items-center"
             {{--          style="background: url('../public/frontend/assets/img/hero-bg.jpg'); background-size: cover;">--}}
             style="background: url('{{$portada->imagen}}'); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h2 data-aos="fade-up">{{ $portada->titulo }}</h2>
                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p> {{ $portada->descripcion }} </p>
                    </blockquote>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <!--<a href="#about" class="btn-get-started">Get Started</a>-->
                        <a href="{{ $portada->link }}" class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->
@endforeach
