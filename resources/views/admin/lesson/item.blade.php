<tr id="row{{$row->id }}">
    <td>{{ $key+1 }}</td>
    <td>{{$row->title }}</td>
    <td>{{$row->classes->title }}</td>
    <td>{{$row->classes->course->title }}</td>
    <td>
        <a class="btn btn-primary btn-outline edit-row" href="/admin/lesson/{{$row->id }}/edit"><i class="fa fa-edit"></i></a>
        <button class="btn btn-danger btn-outline delete-row" delele_id="{{$row->id }}"  onClick="deleteRow({{$row->id }})"><i class="fa fa-trash"></i></button>
    </td>
</tr>