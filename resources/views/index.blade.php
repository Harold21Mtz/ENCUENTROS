<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div class="social2">
    <a class="btn btn-primary mb-1" style="background-color: #3b5998;border-color: #3b5998"
       href="https://www.facebook.com/VIII-Encuentro-Internacional-de-Innovaci%C3%B3n-Tecnol%C3%B3gica-104886368050738"
       target="_blank" role="button"
    ><i class="fab fa-facebook"></i></a>
    <a class="btn btn-primary mb-1" style="background-color: #55acee;border-color: #55acee;"
       href="https://twitter.com/EiitVii" target="_blank" role="button"
    ><i class="fab fa-twitter"></i></a>
    <a class="btn btn-primary" style="background-color: #dd4b39;border-color: #dd4b39;"
       href="mailto:encuentrointit@ufpso.edu.co" role="button"
    ><i class="fas fa-envelope"></i></a>
</div>

@include('include.header')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModal" id="myModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-11">
                    <h4>Enlace de presentaciones por parte de conferencistas nacionales e internacionales </h4>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-4">
                    <a href="https://www.facebook.com/UFPSO/videos/402575337431761/" target="_blank"><img width="170"
                                                                                                          src="assets/img/face.jpg"
                                                                                                          alt=""></a>
                </div>
                <div class="col-lg-4">
                    <a href="https://youtu.be/puNrTcsvtag" target="_blank"><img width="200" src="assets/img/youtube.jpg"
                                                                                alt=""></a>
                </div>

            </div>


        </div>
    </div>
</div>


<!-- ======= Featured Section ======= -->
<section id="featured" class="featured" style="margin-top: 10px;">
    <div class="container">
        <div class="row">
            @if(count($topics) > 0)
                @foreach($topics as $topic)
                    @if($topic->status == 1)
                        <div class="col-lg-4">
                            <div class="icon-box">
                                <a href="#" data-toggle="modal" data-target="#modal{{$topic->id}}">
                                    <img src="{{ asset('uploads/programas/' . $topic->program_image) }}" width="100%"
                                         alt="">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-lg-12">
                    <p style="margin-bottom: 3%">
                        No topics registered
                    </p>
                </div>
            @endif
        </div>
    </div>
</section><!-- End Featured Section -->

@foreach($topics as $topic)
    @if($topic->status == 1)
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal{{$topic->id}}"
             id="modal{{$topic->id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Topics - {{$topic->program_name}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 pt-4 pt-lg-0 content">
                                <ul style="list-style: none; margin-left: -4%;">
                                    @php
                                        $topicsss = preg_split('/(?<=[.?!])\s+/', $topic->program_topics, -1, PREG_SPLIT_NO_EMPTY);
                                    @endphp
                                    @foreach($topicsss as $topicss)
                                        <li><i class="icofont-check-circled"></i> {{$topicss}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach



<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 pt-4 pt-lg-0 text-center ">
                <div class="card mb-1 border-0">
                    <h3><strong>Participating Countries</strong></h3>
                </div>

                @include('vertical')


            </div>

            @if(count($indexs) > 0)
                @foreach($indexs as $index)
                    @if($index->status == 1)
                        <div class="col-lg-6 pt-4 pt-lg-0 ">
                            <h3><strong>Welcome</strong></h3>
                            <p class="text-justify">
                                {{$index->description_one}}
                                <br><br>
                                {{$index->description_two}}
                                <br><br>
                                Registration fees to participate in the event's activities are specified below:<br><br>
                                • Assistants<br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• UFPSO
                                Students: {{$index->ufpso_student}}
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• UFPSO
                                Graduates: {{$index->ufpso_graduate}}
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• External
                                Professionals: {{$index->external_professional}}
                                <br><br>
                                • Oral Presenters {{$index->oral_presenter}} (This is the cost of each paper, regardless
                                of the number of
                                authors)<br><br>
                                For payment and registration we invite you to do it through the <a
                                    href="{{route('registration')}}">Registration</a> section
                                <br><br>
                                We are sure that our event will be a milestone in our series of meetings.
                                <br>
                            <h4><b> {{$index->description_three}}</b></h4>
                            Yours sincerely,<br><br>
                            {{$index->message}}
                            <br>
                        </div>
                    @endif
                @endforeach
            @else
                <p style="margin-bottom: 3%">
                    No index information registered
                </p>
            @endif

            @if(count($dates) > 0)
                <div class="col-lg-3 pt-4 pt-lg-0" style="text-align: center; gap: 2px">
                    @foreach($dates as $date)
                        @if($date->status == 1)

                            <div class="card mb-1 border-0" style="width: 250px;">
                                <h3><strong>Important dates</strong></h3>
                            </div>

                            <div class="card mb-1" style="width: 250px;">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="105"
                                     xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                     focusable="false" role="img" aria-label="Placeholder: Image cap">
                                    <title> {{$date->date_important}}</title>
                                    <rect x="50" y="20" rx="10" ry="10" width="150" height="70"
                                          style="fill:#0D47A1;stroke:#0D47A1;stroke-width:5;opacity:1"/>
                                    <text x="80" y="60" fill="#ffffff" font-size="14" font-weight="bold">
                                        {{$date->date_important}}
                                    </text>
                                </svg>
                                <div class="card-body text-center" style="padding: 0.25rem">
                                    <p class="card-text">{{$date->date_description}}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="col-lg-12">
                    <p style="margin-bottom: 3%">
                        No topics registered
                    </p>
                </div>
            @endif

            <div class="col-lg-12 pt-4 pt-lg-0 content" style="margin-top: 8px;margin-bottom: 8px;">
                <h2 style="color: #0D47A1;">Location of the UFPSO</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15794.538142008698!2d-73.3269409!3d8.2394549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e677a34fd9ca3a3%3A0xb0dc8c0d51bbb7c2!2sUniversidad%20Francisco%20de%20Paula%20Santander%20Oca%C3%B1a!5e0!3m2!1ses!2sco!4v1697634693494!5m2!1ses!2sco"
                    frameborder="0" style="border:0; width: 100%; height: 300px;" allowfullscreen=""></iframe>
            </div>
            <br><br>

        </div>

    </div>
</section>

@include('include.footer2')

<script>
    function lansaModal(id) {

        $(id).modal('show');
    }
</script>
