@include('include.header')

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">


            <h2 style="color: #0D47A1;">Programming - Conferences</h2>

        </div>

    </section><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container">
            <p style="font-size:24px !important"> The schedule for oral presentations can be viewed at the following link :
                <a href="assets/formatos/CALENDARIO IX EIIT.pdf" target="blank">Schedule for oral presentations</a>
            </p>
            @if(count($scientificprograms) > 0)
            @foreach($scientificprograms as $scientificprogram)
            @if($scientificprogram->status == 1)

            <div class="row">
                <div class="col-lg-12 pt-4 pt-lg-0 content">
                    <div class="text-center">

                        <h2 style="font-size: 28px;font-weight: 600; margin-bottom: 20px;    padding-bottom: 20px;    position: relative;    font-family: 'Poppins', sans-serif;">{{$scientificprogram->date_presentation}}</h2>

                    </div>
                </div>
                <div class="col-lg-12 pt-4 pt-lg-0 content">

                    <h2 style="background-color: #0D47A1;color:#fff; margin-bottom:0" class="breadcrumbs text-center">{{$scientificprogram->name_program}}</h2>
                    <hr style="width: 100px; height: 2px;    background: #0D47A1; left: calc(50% - 25px);margin-top:5 ">
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="min-width: 400px; max-width: 410px;">HOUR</th>
                                <th scope="col" style="min-width: 400px; max-width: 410px;">ACTIVITY</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $timeSlots = explode('*', $scientificprogram->hour_presentation);
                            $activities = explode('*', $scientificprogram->activity);
                            @endphp

                            @foreach($timeSlots as $index => $timeSlot)
                            @if(trim($timeSlot) !== '')
                            <tr class="zoom" style="min-width: 400px; max-width: 410px; text-align:justify;">
                                <th scope="row" style="min-width: 400px; max-width: 410px; text-align:justify;">
                                    {{ rtrim($timeSlot) }}
                                </th>
                                <td scope="row" style="min-width: 400px; max-width: 410px; text-align:justify;">
                                    @if($index === 0)
                                    @if(isset($activities[$index]))
                                    {{ rtrim($activities[$index]) }}
                                    @endif
                                    @else
                                    @if(isset($activities[$index - 1]))
                                    {{ rtrim($activities[$index - 1]) }}
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>

                    </table>

                </div>
                @endif
                @endforeach
                @else
                <p style="margin-bottom: 3%">
                    There is no registered conference schedule.
                </p>
                @endif
            </div>
    </section><!-- End About Section -->
</main><!-- End #main -->


@include('include.footer2')
