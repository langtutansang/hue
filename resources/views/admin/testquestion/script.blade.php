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
                "classes",
                ()=>{
                    return ({ 
                        title: $('#create-form input[name="title"]').val(),
                        course_id: $('#create-form select[name="course"]').val(),
                        teacher: $('#create-form input[name="teacher"]').val()
                    })
                }, 
                ()=>{
                    $('.chosen-select').select2({
                        placeholder: 'Chọn khóa học',
                        allowClear: true,
                        dropdownParent: $(".chosen-select-single"),
                    })
                }
            );            
        });
        $('.edit-row').on('click', function(){
            let id = $(this).attr('edit-id');
            getFormEdit(
                "classes", 
                id,
                ()=>{
                    return ({ 
                        title: $('#edit-form input[name="title"]').val(),
                        course_id: $('#edit-form select[name="course"]').val(),
                        teacher: $('#edit-form input[name="teacher"]').val()
                    })
                }, 
                ()=>{
                    $('.chosen-select').select2({
                        placeholder: 'Chọn khóa học',
                        allowClear: true,
                        dropdownParent: $(".chosen-select-single"),
                    })
                }
            );
        });
        $('.delete-row').on('click', function(){
            deletePopup("classes", $(this).attr('delele_id'));
        });        
    });
    $('.chosen-select-testquestion').select2({
        placeholder: 'Chọn tên bài test',
        allowClear: true,
        dropdownParent: $(".chosen-select-single-testquestion"),
    });
    $('.chosen-select-answer').select2({
        placeholder: 'Chọn câu trả lời',
        allowClear: true,
        dropdownParent: $(".chosen-select-single-answer"),
    });
    $('.chosen-select-typequestion').select2({
        placeholder: 'Loại câu hỏi',
        allowClear: true,
        dropdownParent: $(".chosen-select-single-typequestion"),
    });
    </script>