<script src="{{ asset('home/assets/vendor_plugins/carousel/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items:4,
            dots: true,
            dotsEach: 4,
            nav: true,
            margin: 10,
            navContainerClass: 'owl-navigate'
        });
    });
</script>