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
    $(function(){
        $('.modalAdd').on('click', function(){
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
        });
        $('.edit-row').on('click', function(){
            let id = $(this).attr('edit-id');
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
        });
        $('.delete-row').on('click', function(){
            deletePopup("grammar", $(this).attr('delele_id'));
        });
    });
    </script>