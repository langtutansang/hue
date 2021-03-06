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

    function createRow(){
        getFormCreate(
                "test",
                ()=>{
                    return ({ 
                        title: $('#create-form input[name="title"]').val(),
                        classes_id: $('#create-form select[name="classes"]').val(),
                        description: $('#create-form input[name="description"]').val(),
                        timetest: $('#create-form input[name="timetest"]').val(),
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
    }
    function editRow(id){
        getFormEdit(
                "test", 
                id,
                ()=>{
                    return ({ 
                        title: $('#edit-form input[name="title"]').val(),
                        classes_id: $('#edit-form select[name="classes"]').val(),
                        description: $('#edit-form input[name="description"]').val(),
                        timetest: $('#edit-form input[name="timetest"]').val(),
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
    }

    function deleteRow(id){
        deletePopup("test", id);
    }

</script>