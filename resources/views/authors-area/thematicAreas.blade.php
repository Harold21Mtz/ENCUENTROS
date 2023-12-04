@include('include.header')

<main id="main">

  <!-- ======= Featured Section ======= -->

  <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
    <div class="container">


      <h2 style="color: #0D47A1;">Topics</h2>

    </div>
  </section><!-- End Breadcrumbs -->




  <section id="about" class="about" style="margin-top: 10px;">
    <div class="container">
    @if(count($topics) > 0)
      @foreach($topics as $topic)
      @if($topic->status == 1)

      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 content">
          <h2 style="background-color: #0D47A1;color:#fff; " class="breadcrumbs text-center">{{$topic->program_name}}</h2>
          <ul>
        @php
            $topicsss = preg_split('/(?<=[.?!])\s+/', $topic->program_topics, -1, PREG_SPLIT_NO_EMPTY);
        @endphp
        @foreach($topicsss as $topicss)
            <li><i class="icofont-check-circled"></i> {{$topicss}}</li>
        @endforeach
    </ul>

          
        </div>

      </div>
      @else
      <p style="margin-bottom: 3%">
      No career topics registered
      </p>
      @endif
      @endforeach
      @else
      <p style="margin-bottom: 3%">
      No career topics registered
      </p>
      @endif

    </div>
  </section><!-- End About Section -->





</main><!-- End #main -->
@include('include.footer2')