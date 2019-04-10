@extends('admin.layouts.index')

@section('content')
    @include('admin.bill.content')

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
        function viewBillDetail(){
            swal({
                width: '65%',
                html:$(`.template[attr-id="${$(this).attr('edit-id')}"]`).html(),
            })
        
        }
        (function($) {
            'use strict';
            $('#bill-table').DataTable();
            $('.edit-row').on('click',viewBillDetail);
       
        })(jQuery);
    </script>
  
@endsection