<tr id="row{{$row->id }}">
    <td>{{ $key+1 }}</td>
    <td>{{$row->title }}</td>
    <td>{!! $row->description !!}</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}" ><i class="fa fa-edit"></i></button>
        <button class="btn btn-danger btn-outline delete-row" delele_id="{{$row->id }}"><i class="fa fa-trash"></i></button>
    </td>
</tr>