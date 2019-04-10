<tr id="row{{$row->id }}">
    <td>{{$row->id }}</td>
    <td>{{$row->name }}</td>
    <td>{{ $row->email }}</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}"><i class="fa fa-edit"></i></button>
        @if( Auth::guard('admin')->user()->master == 1 && $row->id != Auth::guard('admin')->id() )
            <button class="btn btn-danger btn-outline delete-row" delele_id="{{$row->id }}"><i class="fa fa-trash"></i></button>
        @endif
    </td>
</tr>