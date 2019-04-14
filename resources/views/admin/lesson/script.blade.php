<!-- data table JS
    ============================================ -->
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/tableExport.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/data-table-active.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table-editable.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-editable.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table-resizable.js') }}"></script>
<script src="{{ asset('admin-asset/js/data-table/colResizable-1.5.source.js') }}"></script>
<script src="{{ asset('admin-asset/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('admin-asset/js/data-table/bootstrap-table-export.js') }}"></script>
<script src="{{ asset('admin-asset/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('admin-asset/js/ckeditor/ckeditor.js') }}"></script>
<script>
    $('.chosen-select-classes').select2({
        placeholder: 'Chọn lớp học',
        allowClear: true,
        dropdownParent: $(".chosen-select-single"),
    })
    $(function(){
        $('.edit-row').on('click', function(){
            let id = $(this).attr('edit-id');
            getFormEdit(
                "lesson", 
                id,
                ()=>{
                    return ({
                        title: $('#edit-form input[name="title"]').val(),
                        classes_id: $('#edit-form select[name="classes"]').val(),
                    })
                }, 
                ()=>{
                    $('.chosen-select-classes').select2({
                        placeholder: 'Chọn lớp học',
                        allowClear: true,
                        dropdownParent: $(".chosen-select-single"),
                    })
                }
            );
        });
        $('.delete-row').on('click', function(){
            deletePopup("lesson", $(this).attr('delele_id'));
        });
    });
    CKEDITOR.replace( 'editor1' );
</script>