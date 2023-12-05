@include('include.header')
<style>
    .zoom {
        transition: transform .2s;
    }

    .zoom:hover {
        transform: scale(1.2);
    }
</style>
<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
        <div class="container">


            <h2 style="color: #0D47A1;">Publication Options</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container">
            The speakers have the option of publishing their work in the journals mentioned below, as long as they express this to the e-mail address <a href="mailto:encuentrointit@ufpso.edu.co">encuentrointit@ufpso.edu.co</a> at the time of submitting their abstract. We invite you to select the journal of your preference and learn about the prerequisites for the possible publication of full manuscripts.
            <br><br>
            @if(count($publishings) > 0)
                <div class="content-cart-topic"
                     style="display: flex; justify-content: center;  flex-wrap: wrap; gap: 30px">

                    @foreach($publishings as $publishing)
                        @if($publishing->status == 1)

                            <div class="card" style="width: 18rem;">
                                <a href="{{$publishing->link_journal}}" target="_blank">
                                    <img class="card-img-top zoom"
                                         src="{{ asset('storage/' . $publishing->image_journal) }}"></a>
                                <div class="card-body mx-auto">
                                    <h5 class="card-title"><a href="{{$publishing->link_journal}}"
                                                              target="_blank">{{$publishing->name_journal}}</a></h5>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p style="margin-bottom: 3%">
                    There are no publication options registered
                </p>
            @endif
            <br>
            Should your work be selected for the event, the organizing team will send you the guidelines for submitting the full manuscript. Approval of work at the meeting does not directly link the approval of the manuscript for publication. Authors should apply in accordance with the editorial policies of the journals.
            <br>
        </div>
    </section><!-- End About Section -->

</main><!-- End #main -->
@include('include.footer2')
