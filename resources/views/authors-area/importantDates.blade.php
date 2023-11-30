@include('include.header')
<main id="main">

  <!-- ======= Featured Section ======= -->
  <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
    <div class="container">


      <h2 style="color: #0D47A1;">Important Dates</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section id="about" class="about">
    <div class="container">

        @if(count($dates) > 0 )
            @foreach($dates as $date)
      <div class="row">
        <div class="col-lg-12 pt-4 pt-lg-0 content">


          <ul>
              <li><i class="icofont-check-circled"></i>{{ $date->date_important }} {{$date->date_description }}
          </ul>

        </div>
      </div>
            @endforeach
        @else
            <p>
                No hay fechas importantes registradas
            </p>
        @endif

    </div>
  </section><!-- End About Section -->
</main><!-- End #main -->
@include('include.footer2')
