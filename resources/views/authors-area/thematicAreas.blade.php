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
                <div style="display: flex; justify-content: center;  gap: 60px; flex-wrap: wrap;">

                @foreach($topics as $topic)
                    @if($topic->status == 1)

                                <div style="margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 6px; ">
                                    <h2 style="background-color: #0D47A1;color:#fff; border-top-left-radius: 6px; border-top-right-radius: 6px;"
                                        class="breadcrumbs text-center">{{$topic->program_name}}</h2>
                                    <ul style="list-style-type: none; padding: 16px">
                                        @php
                                            $topicsss = preg_split('/(?<=[.?!])\s+/', $topic->program_topics, -1, PREG_SPLIT_NO_EMPTY);
                                        @endphp
                                        @foreach($topicsss as $topicss)
                                            <li><i class="icofont-check-circled"></i> {{$topicss}}</li>
                                        @endforeach
                                    </ul>
                                </div>


                    @else
                        <p style="margin-bottom: 3%">
                            No career topics registered
                        </p>
                    @endif
                @endforeach
                </div>

            @else
                <p style="margin-bottom: 3%">
                    No career topics registered
                </p>
            @endif

        </div>
    </section><!-- End About Section -->


</main><!-- End #main -->
@include('include.footer2')
