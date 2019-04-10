<table id="datatable-zero" class="display datatable-default">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Số lượng đã bán</th>
            <th>Số lượng còn lại</th>
            <th>Giá gốc</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.warehouse.item')
        @endforeach
    </tbody>
</table>