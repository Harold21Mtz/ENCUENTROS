@include('include.header')


<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">


            <h2 style="color: #0D47A1;">Computer Systems Engineering</h2>
            <p>Inscribete <a href=" https://forms.gle/GS6KAwdAvQqNhecU6">Aquí</a></p>

        </div>

    </section><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container">
            @if(count($scientificprogramsS) > 0)
                @foreach($scientificprogramsS as $scientificprogramS)
                    @if($scientificprogramS->status == 1)
                        <div class="row">
                            <div class="col-lg-12 pt-4 pt-lg-0 content">

                                <div class="text-center">

                                    <h2 style="font-size: 28px;font-weight: 600; margin-bottom: 20px;    padding-bottom: 20px;    position: relative;    font-family: 'Poppins', sans-serif;">{{$scientificprogramS->date_presentation}}</h2>

                                </div>
                            </div>
                            <div class="col-lg-12 pt-4 pt-lg-0 content">


                                <hr style="width: 100px; height: 2px;    background: #0D47A1; left: calc(50% - 25px);margin-top:5px ">
                                <table class="table  table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="min-width: 400px; max-width: 410px;">HOUR</th>
                                        <th scope="col" style="min-width: 400px; max-width: 410px;">ACTIVITY</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $timeSlots = explode('*', $scientificprogramS->hour_presentation);
                                        $activities = explode('*', $scientificprogramS->activity);
                                    @endphp

                                    @foreach($timeSlots as $index => $timeSlot)
                                        @if(trim($timeSlot) !== '')
                                            <tr class="zoom"
                                                style="min-width: 400px; max-width: 410px; text-align:justify;">
                                                <th scope="row"
                                                    style="min-width: 400px; max-width: 410px; text-align:justify;">
                                                    {{ rtrim($timeSlot) }}
                                                </th>
                                                <td scope="row"
                                                    style="min-width: 400px; max-width: 410px; text-align:justify;">
                                                    @if($index === 0)
                                                        @if(isset($activities[$index]))
                                                            {{ rtrim($activities[$index]) }}
                                                        @endif
                                                    @else
                                                        @if(isset($activities[$index - 0]))
                                                            {{ rtrim($activities[$index - 0]) }}
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
        </div>
    </section><!-- End About Section -->
</main><!-- End #main -->


@include('include.footer2')
