<tr id="row{{$row->id }}">
    <td>{{ $key+1 }}</td>
    <td>{{$row->course->title }}</td>
    <td>{{$row->title }}</td>
    <td>{{$row->teacher }}</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row"  edit-id="{{$row->id }}" onClick="editRow({{$row->id }})"><i class="fa fa-edit"></i></button>
        <button class="btn btn-danger btn-outline delete-row" delele_id="{{$row->id }}" onClick="deleteRow({{$row->id }})"><i class="fa fa-trash"></i></button>
    </td>
</tr>