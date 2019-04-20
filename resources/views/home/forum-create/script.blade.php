<script src="{{ asset('home/assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('home/assets/vendor_components/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('home/assets/vendor_components/fileuploads/js/dropify.min.js') }}"></script>
<script type="text/javascript">
    $(function(){
        CKEDITOR.replace( 'content' );
        $('.select2').select2();
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });
    })
</script>