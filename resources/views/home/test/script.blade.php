<script src="{{ asset('home/assets/vendor_plugins/carousel/owl.carousel.min.js') }}"></script>
<script>
    var m = null;
    var s = null;
    var timeout = null; 
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items:4,
            dots: true,
            dotsEach: 4,
            nav: true,
            margin: 10,
            navContainerClass: 'owl-navigate'
        });
        $('#testQuestion').on('submit', function() {
            let flag = true;
            $('.question-item').each(function(){

                if($(this).find('input[type="radio"]:not(:checked)').length == $(this).find('input[type="radio"]').length ){
                    $(this).find('.setColor').toggleClass('text-danger');
                    
                    flag = false;
                }
            });
            return flag;
        });
        $('input').on('change',function(){
            $(this).parents('.question-item').find('.setColor').removeClass('text-danger');
        })
    });
    function getTimeRemaining(t) {
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id) {
        $('#testQuestion').css("display", "block");
        $('#btnStart').css("display", "none");
        $('#timetest').css("display", "block");

        var clock = document.getElementById(id);
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');
        let time = +$("#timestart").val() * 60 *1000;

        function updateClock() {
            var t = getTimeRemaining(time);
            time -= 1000;
            if(t < 0 ){
                stop();
            }
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
            clearInterval(timeinterval);
            }
        }
        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }    
    function stop(){
       $("#testQuestion").submit();
    }
    
    
</script>