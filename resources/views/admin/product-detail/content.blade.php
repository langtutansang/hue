<table id="datatable-zero" class="display datatable-default">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Loại sản phẩm</th>
            <th>Chi tiết</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.product-detail.item')
        @endforeach
    </tbody>
</table>