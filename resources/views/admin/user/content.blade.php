<table id="datatable-zero" class="display datatable-default">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>SDT</th>
            <th>Địa chỉ</th>
            <th>CMND</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.user.item')
        @endforeach
    </tbody>
</table>