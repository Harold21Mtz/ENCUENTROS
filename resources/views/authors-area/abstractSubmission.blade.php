@include('include.header')

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">

            <h2 style="color: #0D47A1;">Abstract Submission</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container">
            @if(count($submissions) > 0)
                @foreach($submissions as $submission)
                    @if($submission->status == 1)
                        <div class="row">
                            <div class="col-lg-12 pt-4 pt-lg-0 content">

                                <p class="text-justify">
                                    {{$submission->submission_conference}}
                                    <br><br>
                                    Oral presentations must have the following
                                    information: {{$submission->submission_structure}}
                                    <br><br>
                                    {!! nl2br(preg_replace('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/', '<a href="https://mail.google.com/mail/?view=cm&fs=1&to=$1" target="_blank">$1</a>', $submission->submission_description)) !!}
                                    <br><br>
                                    Abstracts selected for presentation will be compiled as event proceedings via ISSN
                                    2665-3095 (Online).
                                    <br><br>
                                    Here you can download the abstract template:
                                    <br><br>
                                    <a href="https://eventos.ufpso.edu.co/X_ENCUENTRO/assets/formatos/FormatodeResumenXEIIT.docx"><img
                                            src="assets/img/iconos/word.png" width="60px"></a>
                                    <br><br>
                                    Here you can download the oral presentation template:
                                    <br><br>
                                    <a href="https://eventos.ufpso.edu.co/X_ENCUENTRO/assets/formatos/PonenciaXEncuentro.pptx">
                                        <img src="assets/img/iconos/powerPoint.png" width="60px"></a>
                                    <br><br>
                                </p>
                            </div>
                        </div>
                    @else
                        <p style="margin-bottom: 3%">
                            There is no Abstract Submission
                        </p>
                    @endif
                @endforeach
            @else
                <p style="margin-bottom: 3%">
                    There is no Abstract Submission
                </p>
            @endif

        </div>
    </section><!-- End About Section -->
</main><!-- End #main -->

@include('include.footer2')
