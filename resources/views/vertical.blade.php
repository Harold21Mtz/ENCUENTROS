<style>
    @import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css";

    .owl-carousel {
        transform: rotate(90deg);
        width: 500px;
        margin-top: 90px;
        left: -240px;
        height: 300px;
        /* background-color: red; */

    }

    .item {
        transform: rotate(-90deg);
        padding: 25px;
        width: 500px;
        height: 120px;

    }

    .owl-carousel .owl-nav {
        display: flex;
        justify-content: space-between;
        position: absolute;
        width: 100%;
        top: 30px;
        margin: 0;


        /* top: calc(50% - 33px); */
        /* background-color: red; */
    }

    div.owl-carousel .owl-nav .owl-prev,
    div.owl-carousel .owl-nav .owl-next {
        font-size: 36px;
        top: unset;
        bottom: 15px;
    }
</style>

<div class="owl-carousel owl-theme">
    @foreach(File::files(public_path('uploads/countries')) as $file)
        <img class="item rounded-circle" src="{{ asset('uploads/countries/' . basename($file)) }}" alt="Hotel Image">
    @endforeach
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            rewind: true,
            autoplay: true,
            margin: 0,
            nav: false,
            autoplayTimeout: 1000
        });
    });
</script>
