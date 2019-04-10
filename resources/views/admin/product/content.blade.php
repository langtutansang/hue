<table id="datatable-zero" class="display datatable-default">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hình</th>
            <th>Tên</th>
            <th>Giá</th>
            <th> Sale</th>
            <th>Nhãn hiệu</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.product.item')
        @endforeach
    </tbody>
</table>