@extends('admin.layouts.index')

@section('content')
    @include('admin.brand.content')
    @include('admin.brand.create')

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
                        url:`/admin/brand/${$(this).attr('delele_id')}`,
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
                url:`/admin/brand/${id}/edit`,
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

                    $('#edit-form .form-style[name="title"]').on('keyup', function(){
                        $('#edit-form .form-style[name="slug"]').parent().find('p').addClass('formTop');
                        $('#edit-form .form-style[name="slug"]').val(converSlug($(this).val()));
                    });
                }
            })
            .then((data)=> {

                $.ajax({
                    type:'PATCH',
                    url:`/admin/brand/${id}`,
                    data: {
                        title: $('#edit-form .form-style[name="title"]').val(),
                        category_id: $('#edit-form .form-style[name="category_id"]').val(),
                        slug: $('#edit-form .form-style[name="slug"]').val(),

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
            $('.form-style[name="category_id"]').val(null)
            $('.form-style[name="slug"]').val(null)
        }
        function addPopup(){
            let data = {
                title: $('.form-style[name="title"]').val(),
                category_id: $('.form-style[name="category_id"]').val(),
                slug: $('.form-style[name="slug"]').val(),
            }
            $.ajax({
                type:'POST',
                url:`/admin/brand`,
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

            $('.form-style[name="title"]').on('keyup', function(){
                $('.form-style[name="slug"]').parent().find('p').addClass('formTop');
                $('.form-style[name="slug"]').val(converSlug($(this).val()));
            });

            addListener();
        })(jQuery);
       
    </script>
    <script src="{{ asset('admin-asset/global/js/datatable.min.js')}}"></script>

@endsection