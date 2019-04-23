<script src="{{ asset('home/assets/vendor_plugins/carousel/owl.carousel.min.js') }}"></script>
<script>
$(function(){
  $('.avata-content').on('click', function(){
    $('input[type="file"]').click();
  });
  $('input[type="file"]').on('change', function(){
    let files = $(this).prop('files');
    if(!files.length){
      $('.avata-content img').attr('src', $('.old-picture').html());
      return;
    }
    reader = new FileReader();
    reader.readAsDataURL(files[0]);
    reader.onload = function () {
      $('.avata-content img').attr('src', reader.result);
    };

  });

})
</script>