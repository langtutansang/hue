<tr id="row{{$row->id }}">
    <td>{{ $key+1 }}</td>
    <td>{{$row->date }}</td>
    <td>{{$row->test->title }}</td>
    <td>{{$row->users_id }}</td>
    <td>{{$row->score }}</td>
    <td>
        <a href="/admin/resulttestdetail/{{$row->id }}" class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}" ><i class="fa fa-eye"></i></a>
    </td>
</tr>