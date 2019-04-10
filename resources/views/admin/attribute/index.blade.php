@extends('admin.layouts.index')

@section('content')
    @include('admin.attribute.content')
    @include('admin.attribute.create')

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/datatables/media/css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/datatables/media/css/dataTables.bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/animate.css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/sweetalert2/dist/sweetalert2.min.css')}}"/>
@endsection

@section('script')
    <script src="{{ asset('admin-asset/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/js/form_input.min.js')}}"></script>
    <script>
        const addListener = function(){
            $('.delete-row').off()
            $('.edit-row').off()
            $('.delete-row').on('click', deleteRow)
            $('.edit-row').on('click', editRow)
        }

        function deleteRow() {

            deletePopup()
                .then(()=>{
                    $.ajax({
                        type:'DELETE',
                        url:`/admin/attribute/${$(this).attr('delele_id')}`,
                        success:(res) => {
                            if(!!+res){
                                $(this).parents('tr').remove()
                                deleteSuccessPopup();
                            }
                            else deleteErrorPopup()
                        }
                    })
                })
                .catch(err => {})
        }

        function editRow() {
            let id = $(this).attr('edit-id');
            $.ajax({
                type:'GET',
                url:`/admin/attribute/${id}/edit`,
                success:(res) => {
                    if(res.status === 200 ){
                        editPopup(res.data, id);
                    }
                    else updateErrorPopup()
                }
            })
        }

        function editPopup(data, id) {
            swal({
                html: data,
                showCancelButton:true,
                confirmButtonColor:"#3085d6",
                cancelButtonColor:"#d33",
                confirmButtonText:"Xác nhận",
                cancelButtonText:"Hủy bỏ",
                onOpen: ()=> {
                    var formInputs = $('#edit-form input,#edit-form textarea');
                    formInputs.focus(function() {
                        $(this).parent().children('p.formLabel').addClass('formTop');
                    });
                    formInputs.focusout(function() {
                        if ($.trim($(this).val()).length == 0){
                            $(this).parent().children('p.formLabel').removeClass('formTop');
                        }
                    });
                    formInputs.each(function() {
                        if ($.trim($(this).val()).length == 0){
                            $(this).parent().children('p.formLabel').removeClass('formTop');
                        }
                        else{
                            $(this).parent().children('p.formLabel').addClass('formTop');
                        }
                    });

                    $('p.formLabel').click(function(){
                        $(this).parent().children('.form-style').focus();
                    });

                }
            })
            .then((data)=> {

                $.ajax({
                    type:'PATCH',
                    url:`/admin/attribute/${id}`,
                    data: {
                        title: $('#edit-form .form-style[name="title"]').val(),
                        type: $('#edit-form .form-style[name="type"]').val(),
                    },
                    success:(res) => {
                        if(res.status === 200 ){
                            $(`tr#row${id}`).replaceWith(res.data);
                            addListener();
                            updateSuccessPopup();
                        }
                        else updateErrorPopup()
                    },
                    error: ()=> {
                        updateErrorPopup()
                    }
                })
            })
            .catch(()=> {} )
            
        }
        function clearInput(){
            $('.form-style[name="title"]').val(null);
            $('.form-style[name="type"]').val(null);
        }

        function addPopup(){
            let data = {
                title: $('.form-style[name="title"]').val(),
                type: $('.form-style[name="type"]').val(),
            }
         
            $.ajax({
                type:'POST',
                url:`/admin/attribute`,
                data,
                success:(res) => {
                    if(res.data){
                        $('#create-modal').modal('hide');
                        $('tbody').prepend(res.data);
                        createSuccessPopup();
                        addListener();
                        clearInput()
                        
                    }
                    else createErrorPopup()
                },
                error: ()=> {
                    createErrorPopup()
                }
            })
        }

        (function($) {
            'use strict';
            $($('#template-button-create').html()).insertBefore('.datatable-default');
            $('#create-button').on('click', addPopup)
            addListener();
        })(jQuery);
       
    </script>
    <script src="{{ asset('admin-asset/global/js/datatable.min.js')}}"></script>
@endsection