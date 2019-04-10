@extends('admin.layouts.index')

@section('content')
    @include('admin.statistical.salary')
    @include('admin.statistical.bestbuy')

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/datatables/media/css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/datatables/media/css/dataTables.bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/animate.css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/sweetalert2/dist/sweetalert2.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/ckeditor/contents.css')}}"/>

    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/morris.js/morris.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-asset/global/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}"/>
@endsection

@section('script')
    <script src="{{ asset('admin-asset/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/js/form_input.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/ckeditor/ckeditor.js')}}"></script>

    <script src="{{ asset('admin-asset/global/plugins/morris.js/morris.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin-asset/global/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <script>
        function setMorris(res, date = undefined){
            if(!date) date = moment();
            let maxday = date.endOf('month').date();
            let data =[...Array(maxday)].map( (e,k) => ({x: `${moment().date(k +1).format('YYYY-MM-DD')}`, y: null, z: null}) );
            res.salary.forEach(e=> {
                data[e.day] = {...data[e.day], y: e.total, z: e.costprice} 
            })
            Morris.Area({
                element: 'salary',
                resize: true,
                data,
                xkey: 'x',
                ykeys: ['y', 'z'],
                labels: ['Tiền bán', 'Tiền vốn'],
                lineColors: ['#4390ff', 'z']
            })

            data =[...Array(maxday)].map( (e,k) => ({x: `${moment().date(k +1).format('YYYY-MM-DD')}`, y: null}) );
            res.soldProduct.forEach(e=> {
                data[e.day] = {...data[e.day], y: e.total} 
            })
            Morris.Area({
                element: 'sold-product',
                resize: true,
                data,
                xkey: 'x',
                ykeys: ['y'],
                labels: ['Số lượng'],
                lineColors: ['#4390ff', 'z']
            })

        }
        (function($) {
            'use strict';
            $("#change-salary").datepicker( {
                format: "yyyy-mm",
                viewMode: "months", 
                minViewMode: "months"
            })
            $.ajax({
                type: 'GET',
                url: '/admin/statistical/salary',
                success: function(res){
                    setMorris(res)
                }
            })

            $.ajax({
                type: 'GET',
                url: '/admin/statistical/bestbuy',
                success: function(res){
                    Morris.Bar({
                        element: 'bestbuy',
                        resize: true,
                        data:  res.bestbuy,
                        xkey: 'title',
                        ykeys: ['sold'],
                        labels: ['Đã bán'],
                        barColors: ['#4390ff', '#7a92a3', '#4da74d'],
                        stacked: true
                    });

                    Morris.Bar({
                        element: 'badbuy',
                        resize: true,
                        data:  res.badbuy,
                        xkey: 'title',
                        ykeys: ['sold'],
                        labels: ['Đã bán'],
                        barColors: ['#4390ff', '#7a92a3', '#4da74d'],
                        stacked: true
                    });

                }
            })

           

            $('#change-salary').on('change', function(){
                let date= moment($(this).val() + '-10');
                $.ajax({
                type: 'GET',
                url: `/admin/statistical/salary?datetime=${date.format('X')}`,
                success: function(res){
                    $("#sold-product, #salary").empty();
                    setMorris(res, date)
                }
            })
            })
        })(jQuery);
       
    </script>



@endsection