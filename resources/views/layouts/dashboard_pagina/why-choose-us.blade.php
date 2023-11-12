<!-- ======= Why Choose Us Section ======= -->
<section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Why Choose Us</h2>

        </div>

        @foreach($whyChooseUs as $whyChooseU)
            <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                <div class="col-xl-5 img-bg" style="background-image:url('{{$whyChooseU->imagen_why}}')"></div>
                <div class="col-xl-7 slides  position-relative">

                    <div class="slides-1 swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">{{$whyChooseU->titulo_why}}</h3>
                                    <p>{{$whyChooseU->descripcion_why}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</section><!-- End Why Choose Us Section -->
