<table id="datatable-zero" class="display datatable-default">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.account.item')
        @endforeach
    </tbody>
</table>