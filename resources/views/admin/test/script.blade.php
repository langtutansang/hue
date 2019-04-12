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
<script>
    $(function(){
        $('.modalAdd').on('click', function(){
            getFormCreate(
                "test",
                ()=>{
                    return ({ 
                        title: $('#create-form input[name="title"]').val(),
                        classes_id: $('#create-form select[name="classes"]').val(),
                        description: $('#create-form select[name="description"]').val(),
                        timetest: $('#create-form select[name="timetest"]').val(),
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
        $('.edit-row').on('click', function(){
            let id = $(this).attr('edit-id');
            getFormEdit(
                "test", 
                id,
                ()=>{
                    return ({ 
                        title: $('#edit-form input[name="title"]').val(),
                        classes_id: $('#edit-form select[name="classes"]').val(),
                        description: $('#edit-form select[name="description"]').val(),
                        timetest: $('#edit-form select[name="timetest"]').val(),
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
            deletePopup("test", $(this).attr('delele_id'));
        });
    });
    </script>