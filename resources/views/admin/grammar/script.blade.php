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
<script src="{{ asset('admin-asset/js/ckeditor/ckeditor.js') }}"></script>
<script>
    function createRow(){
        getFormCreate(
                "grammar",
                ()=>{
                    return ({ 
                        title: $('#create-form input[name="title"]').val(),
                        description: CKEDITOR.instances['description'].getData(),
                    })
                },
                ()=>{
                    CKEDITOR.replace( 'description' );
                },
                {
                    width: 950,                    
                },
            );    
    }
    function editRow(id){
        getFormEdit(
                "grammar", 
                id,
                ()=>{
                    return ({ 
                        title: $('#edit-form input[name="title"]').val(),
                        description: CKEDITOR.instances['description'].getData(),
                    })
                },
                ()=>{
                    CKEDITOR.replace( 'description' );
                },

                {
                    width: 950,                    
                },
            );
    }

    function deleteRow(id){
        deletePopup("grammar", id);
    }
</script>