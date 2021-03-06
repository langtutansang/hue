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
            "classes",
            ()=>{
                return ({ 
                    title: $('#create-form input[name="title"]').val(),
                    course_id: $('#create-form select[name="course"]').val(),
                    admin_id: $('#create-form select[name="admin_id"]').val(),
                    previous_class: $('#create-form select[name="previous_class"]').val(),
                })
            },
            ()=>{
                $('.select2').select2()
                let course = $('#create-form select[name="course"]').val();
                $('#create-form select[name="previous_class"] option').attr('hidden', true);
                $(`#create-form select[name="previous_class"] option[course_id="${course}"]`).attr('hidden', false);
                $('#create-form select[name="previous_class"] option[value=""]').attr('hidden', false);

                $('#create-form select[name="course"]').on('change', function(){
                    let course = $('#create-form select[name="course"]').val();
                    $('#create-form select[name="previous_class"] option').attr('hidden', true);
                    $('#create-form select[name="previous_class"] option[value=""]').attr('hidden', false);
                    $(`#create-form select[name="previous_class"] option[course_id="${course}"]`).attr('hidden', false);
                })

            }
        );    
    }
    function editRow(id){
        getFormEdit(
            "classes", 
            id,
            ()=>{
                return ({ 
                    title: $('#edit-form input[name="title"]').val(),
                    course_id: $('#edit-form select[name="course"]').val(),
                    admin_id: $('#edit-form select[name="admin_id"]').val(),
                    previous_class: $('#edit-form select[name="previous_class"]').val(),
                })
            },
            ()=>{
                $('.select2').select2();
                let course = $('#edit-form select[name="course"]').val();
                $('#edit-form select[name="previous_class"] option').attr('hidden', true);
                $(`#edit-form select[name="previous_class"] option[course_id="${course}"]`).attr('hidden', false);
                $('#edit-form select[name="previous_class"] option[value=""]').attr('hidden', false);

                $('#edit-form select[name="course"]').on('change', function(){
                    let course = $('#edit-form select[name="course"]').val();
                    $('#edit-form select[name="previous_class"] option').attr('hidden', true);
                    $('#edit-form select[name="previous_class"] option[value=""]').attr('hidden', false);
                    $(`#edit-form select[name="previous_class"] option[course_id="${course}"]`).attr('hidden', false);
                })

            }
        );
    }

    function deleteRow(id){
        deletePopup("classes", id);
    }

    </script>