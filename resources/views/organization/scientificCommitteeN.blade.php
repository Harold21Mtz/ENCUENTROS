@include('include.header')

<!-- ======= Featured Section ======= -->
<section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
    <div class="container">
        <h2 style="color: #0D47A1;">National Scientific Committee</h2>
    </div>
</section><!-- End Breadcrumbs -->

<section id="team" class="team">
    <div class="container">
        <br>
        @if(count($scientificscommiteeN) > 0)
            <div class="row" style="display:flex; flex-wrap: wrap;">
                @foreach($scientificscommiteeN as $index => $scientificcommiteeN)
                    @if($scientificcommiteeN->status == 1)
                        <div class="col-lg-6 col-md-6">
                            <h4 style="margin-bottom:0px;cursor:pointer" data-toggle="modal"
                                data-target="#modal{{$scientificcommiteeN->id}}">{{$scientificcommiteeN->scientific_name}}
                                , {{$scientificcommiteeN->scientific_title}}
                            </h4>
                            <i class="icofont-circled-right"
                               style="color: #0D47A1;margin-left:15px"></i> {{$scientificcommiteeN->scientific_university}}

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$scientificcommiteeN->id}}" tabindex="-1"
                                 aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="modalLabel8">{{$scientificcommiteeN->scientific_name}}
                                                , {{$scientificcommiteeN->scientific_title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-justify">
                                            {{$scientificcommiteeN->scientific_description}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <br>
        @else
            <p style="margin-bottom: 3%">
                No committee scientific national recorded
            </p>
        @endif
    </div>
</section><!-- End Team Section -->

<section id="testimonials" class="testimonials" style="margin-top: 20px;">
    <div class="container">
        <div class="section-title">
            <h2>Organizing Entity</h2>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="testimonial-item text-center">
                    <img src="https://ufpso.edu.co/images/identidadcorporativa/logoVertical.png" width="200px">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item text-center">
                    <img src="https://eventos.ufpso.edu.co/VIII_ENCUENTRO/assets/img/LogoFacultad.jpeg" width="250px">
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

@include('include.footer2');
