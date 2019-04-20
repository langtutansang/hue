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
            "courses",
            ()=>{
                return ({ 
                    title: $('#create-form input[name="title"]').val(),
                    category_id: $('#create-form select[name="category"]').val(),
                })
            },
            ()=>{
                $('.select2').select2({})
            }
        );  
    }
    function editRow(id){
        getFormEdit(
            "courses", 
            id,
            ()=>{
                return ({
                    title: $('#edit-form input[name="title"]').val(),
                    category_id: $('#edit-form select[name="category"]').val()
                })
            }, 
            ()=>{
                $('.select2').select2()
            }
        );
    }

    function deleteRow(id){
        deletePopup("courses", id);
    }
    </script>