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
                "lessonvocabulary",
                ()=>{
                    return ({ 
                        title: $('#create-form input[name="title"]').val(),
                        lesson_id: $('#create-form select[name="lesson"]').val(),
                        vocabulary_id: $('#create-form select[name="vocabulary"]').val(),
                    })
                }, 
                ()=>{
                    $('.chosen-select-lesson').select2({
                        placeholder: 'Chọn lớp học',
                        allowClear: true,
                        dropdownParent: $(".chosen-select-single"),
                    });
                    $('.chosen-select-vocabulary').select2({
                        placeholder: 'Chọn từ vựng',
                        allowClear: true,
                        dropdownParent: $(".chosen-select-single"),
                    })
                }
            );            
        });
        $('.edit-row').on('click', function(){
            let id = $(this).attr('edit-id');
            getFormEdit(
                "lessonvocabulary", 
                id,
                ()=>{
                    return ({ 
                        title: $('#edit-form input[name="title"]').val(),
                        course_id: $('#edit-form select[name="course"]').val(),
                        teacher: $('#edit-form input[name="teacher"]').val()
                    })
                }, 
                ()=>{
                    $('.chosen-select-lesson').select2({
                        placeholder: 'Chọn lớp học',
                        allowClear: true,
                        dropdownParent: $(".chosen-select-single-lesson"),
                    });
                    $('.chosen-select-vocabulary').select2({
                        placeholder: 'Chọn từ vựng',
                        allowClear: true,
                        dropdownParent: $(".chosen-select-single-vocabulary"),
                    })
                }
            );
        });
        $('.delete-row').on('click', function(){
            deletePopup("lessonvocabulary", $(this).attr('delele_id'));
        });
    });
    </script>