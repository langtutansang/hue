<table id="datatable-zero" class="display datatable-default">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Loại sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.brand.item')
        @endforeach
    </tbody>
</table>