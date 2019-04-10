@extends('admin.layouts.index')

@section('content')
    @include('admin.account.content')
    @include('admin.account.create')

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
                        url:`/admin/account/${$(this).attr('delele_id')}`,
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
                url:`/admin/account/${id}/edit`,
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
                    url:`/admin/account/${id}`,
                    data: {
                        name: $('#edit-form .form-style[name="name"]').val(),
                        password_old: $('#edit-form .form-style[name="password_old"]').val(),
                        password: $('#edit-form .form-style[name="password"]').val(),
                        password_confirmation: $('#edit-form .form-style[name="password_confirmation"]').val(),
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
            $('.form-style[name="name"]').val(null);
            $('.form-style[name="email"]').val(null)
            $('.form-style[name="password"]').val(null)
            $('.form-style[name="password_confirmation"]').val(null)
        }
        function addPopup(){
            let data = {
                name: $('.form-style[name="name"]').val(),
                email: $('.form-style[name="email"]').val(),
                password: $('.form-style[name="password"]').val(),
                password_confirmation: $('.form-style[name="password_confirmation"]').val(),
            }
            $.ajax({
                type:'POST',
                url:`/admin/account`,
                data,
                success:(res) => {
                    if(res.data){
                        $('#create-modal').modal('hide');
                        $('tbody').prepend(res.data);
                        createSuccessPopup();
                        addListener();
                        clearInput();
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