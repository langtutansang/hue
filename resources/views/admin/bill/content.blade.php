<table class="display nowrap dataTable dtr-inline collapsed" id="bill-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Loại khách hàng</th>
            <th>Thời gian</th>
            <th>Tình trạng</th>
            <th>Thanh toán</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.bill.item')
        @endforeach
    </tbody>
</table>

@foreach($model as $row)
    @include('admin.bill.itemdetail')
@endforeach