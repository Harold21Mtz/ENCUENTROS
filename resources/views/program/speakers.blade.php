@include('include.header')

<main id="main">

  <!-- ======= Featured Section ======= -->
  <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
    <div class="container">
      <h2 style="color: #0D47A1;">Speakers</h2>
    </div>
  </section><!-- End Breadcrumbs -->

  <section id="team" class="team">
    <div class="container">
      <div class="row">
        @if(count($speakers) > 0)
        @foreach($speakers as $speaker)
        @if($speaker->status == 1)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img  src="{{ asset('storage/' . $speaker->speaker_profile) }}" style="width: 300px; height: 200px;" alt="">
            <h4>{{$speaker->speaker_name}}, {{$speaker->speaker_title}}</h4>
            <span>{{$speaker->speaker_presentation}}<br>{{$speaker->speaker_university}}</span>
            <div class="social">
              <img  src="{{ asset('storage/' . $speaker->speaker_image_country) }}" style="border-radius: 0; width: 40px;"><br>
              <a href="" data-toggle="modal" data-target="#modalOscarAndresCuanaloCampos"><i style="font-size: 28px;" class="icofont-search-job"></i></a>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalOscarAndresCuanaloCampos" tabindex="-1" aria-labelledby="modalLabel12234" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel12234">Oscar Andrés Cuanalo Campos, PhD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-justify">
                Civil Engineer graduated from the Benemérita Universidad Autónoma de Puebla (BUAP), Master in Engineering in Soil Mechanics from the Universidad Nacional Autónoma de México and Doctor in Sciences from the Construction Department of the Universidad Central de las Villas de Cuba.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <p style="margin-bottom: 3%">
        No speakers registered
      </p>
      @endif
      @endforeach
      @else
      <p style="margin-bottom: 3%">
        No speakers registered
      </p>
      @endif
    </div>
  </section><!-- End Team Section -->

</main><!-- End #main -->

@include('include.footer2')