<table id="datatable-zero" class="display datatable-default">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $row)
            @include('admin.category.item')
        @endforeach
    </tbody>
</table>