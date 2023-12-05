@include('include.header')

<main id="main">

  <!-- ======= Featured Section ======= -->
  <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
    <div class="container">


      <h2 style="color: #0D47A1;">Instructions for Authors</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section id="about" class="about">
    <div class="container">
      @if(count($instructions) > 0)
      @foreach($instructions as $instruction)
      @if($instruction->status == 1)
      <div class="row">
        <div class="col-lg-12 pt-4 pt-lg-0 content">
          <p class="text-justify">
            {{$instruction->instruction_conference}}
            <br><br>
            {{$instruction->instruction_description}}
            <br><br>
            The following aspects should be taken into account:
          </p>
          <ul>
        @php
            $aspects = preg_split('/(?<=[.?!])\s+/', $instruction->instruction_aspects, -1, PREG_SPLIT_NO_EMPTY);
        @endphp
        @foreach($aspects as $aspect)
            <li><i class="icofont-check-circled"></i> {{$aspect}}</li>
        @endforeach
    </ul>
        </div>
      </div>
      @endif
      @endforeach
      @else
      <p style="margin-bottom: 3%">
        No author's instructions registered
      </p>
      @endif

    </div>
  </section><!-- End About Section -->
</main><!-- End #main -->

@include('include.footer2')
