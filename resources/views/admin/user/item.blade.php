<tr id="row{{$row->id }}">
    <td>{{$row->id }}</td>
    <td>{{$row->name }}</td>
    <td>{{ $row->phone }}</td>
    <td>{{ $row->address }}</td>
    <td>{{ $row->email }}</td>
    <td>
        <button class="btn btn-danger btn-outline delete-row" delele_id="{{$row->id }}"><i class="fa fa-trash"></i></button>
    </td>
</tr>