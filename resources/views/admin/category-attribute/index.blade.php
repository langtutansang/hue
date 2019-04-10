@extends('admin.layouts.index')

@section('content')
    @include('admin.category-attribute.content')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/datatables/media/css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/datatables/media/css/dataTables.bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/animate.css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/sweetalert2/dist/sweetalert2.min.css')}}"/>
    <!-- <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/chosen/chosen.min.css')}}"/> -->
@endsection

@section('script')
    <script src="{{ asset('admin-asset/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <!-- <script src="{{ asset('admin-asset/global/plugins/chosen/chosen.min.js')}}"></script> -->
    <script src="{{ asset('admin-asset/global/js/form_input.min.js')}}"></script>
    <script>
        const addListener = function(){
            renderDropdownCreate();
            $('.delete-row').off()
            $('.add-row').off()
            $('.delete-row').on('click', deleteRow)
            $('.add-row').on('click', createRow)

        }

        function deleteRow() {

            deletePopup()
                .then(()=>{
                    $.ajax({
                        type:'DELETE',
                        url:`/admin/category-attribute/${$(this).attr('delele_id')}`,
                        success:(res) => {
                            if(!!+res){
                                $(this).parent().remove()
                                deleteSuccessPopup();
                            }
                            else deleteErrorPopup()
                        }
                    })
                })
                .catch(err => {})
        }

        function createRow(){
            let data = {
                attribute_id: $(this).parent().attr('attr-id'),
                category_id: $(this).parents('.list-circle').attr('category-id')
            }
            $.ajax({
                type:'POST',
                url:`/admin/category-attribute`,
                data,
                success:(res) => {
                    if(res.data){
                        $(this).parents('div[category-id]').prepend(res.data);
                        createSuccessPopup();
                        addListener();
                    }
                    else createErrorPopup()
                },
                error: ()=>{
                    createErrorPopup()
                }
            })
        }

        function renderDropdownCreate(){
            $('.add-row-dropdown li').each(function( key){
                if(
                    $(this).parents('div[category-id]')
                    .has(`.circle[attr-id="${$(this).attr('attr-id')}"]`).length
                ) $(this).remove();
            })
        }
        (function($) {
            'use strict';
            addListener();
        })(jQuery);
       
    </script>
    <script src="{{ asset('admin-asset/global/js/datatable.min.js')}}"></script>

@endsection