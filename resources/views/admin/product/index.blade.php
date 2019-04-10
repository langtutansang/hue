@extends('admin.layouts.index')

@section('content')
    @include('admin.product.content')
    @include('admin.product.create')

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
                        url:`/admin/product/${$(this).attr('delele_id')}`,
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
                url:`/admin/product/${id}/edit`,
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

                    $('.edit-upload-div').on('click', function(){
                        $('#edit-upload-input').click();
                    })

                    $('#edit-upload-input').on('change', function(){
                        let file = $(this).prop('files')[0];
                        if( file ) {
                            if (file) {
                                var reader = new FileReader();
                                reader.readAsDataURL(file);
                                reader.onload = function(e) {
                                    $('.edit-upload-div img').attr('src', e.target.result)
                                };
                            }
                        }
                        else $('.edit-upload-div img').attr('src', $('.edit-upload-div img').attr('oldsrc'))
                    })


                }
            })
            .then((data)=> {

                var formData = new FormData();
                let file = $('#edit-upload-input').prop('files')[0];
                formData.append("picture", file);
                formData.append("title", $('#edit-form .form-style[name="title"]').val());
                formData.append("price", $('#edit-form .form-style[name="price"]').val());
                formData.append("sale", $('#edit-form .form-style[name="sale"]').val() ? $('#edit-form .form-style[name="sale"]').val(): $('#edit-form .form-style[name="price"]').val() );
                formData.append("brand_id", $('#edit-form .form-style[name="brand_id"]').val());


                $.ajax({
                    type:'PATCH',
                    url:`/admin/product/${id}`,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:(res) => {
                        if(res.status === 200 ){
                            $(`tr#row${id}`).replaceWith(res.data);
                            addListener();
                            updateSuccessPopup();
                        }
                        else updateErrorPopup()
                    },
                    error: ()=>{
                        updateErrorPopup()
                    }
                })
            })
            .catch(()=> {} )
            
        }
        function clearInput(){
            $('.form-style[name="title"]').val(null);
            $('.form-style[name="price"]').val(null)
            $('.form-style[name="sale"]').val(null)
            $('.form-style[name="brand_id"]').val(null)
            $('#create-upload-input').val(null)
        }

        function addPopup(){

            var formData = new FormData();
            let file = $('#create-upload-input').prop('files')[0];
            formData.append("picture", file);
            formData.append("title",  $('#create-modal .form-style[name="title"]').val());
            formData.append("price",  $('#create-modal .form-style[name="price"]').val());
            formData.append("sale",  $('#create-modal .form-style[name="sale"]').val());
            formData.append("brand_id",  $('#create-modal .form-style[name="brand_id"]').val());

            $.ajax({
                type:'POST',
                url:`/admin/product`,
                data: formData,
                processData: false,
                contentType: false,
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
                error: ()=>{
                    createErrorPopup()
                }
            })
        }

        (function($) {
            'use strict';
            $($('#template-button-create').html()).insertBefore('.datatable-default');
            $('#create-button').on('click', addPopup)
            $('.create-upload-div').on('click', function(){
                $('#create-upload-input').click();
            })

            $('#create-upload-input').on('change', function(){
                let file = $(this).prop('files')[0];
                if( file ) {
                    if (file) {
                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function(e) {
                            $('.create-upload-div img').attr('src', e.target.result)
                        };
                    }
                }
                else $('.create-upload-div img').attr('src', '')
            })
            addListener();
        })(jQuery);
       
    </script>
    <script src="{{ asset('admin-asset/global/js/datatable.min.js')}}"></script>

@endsection