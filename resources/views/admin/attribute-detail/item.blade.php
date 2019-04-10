<tr id="row{{$row->id }}">
    <td>{{$row->id }}</td>
    <td>
        @if($row->attribute->type === 1)
            <div class="display-color" style="background: {{ $row->title }}">{{$row->title }}
            </div>
        @else
            {{$row->title }}
        @endif
     
    </td>
    <td>{{ $row->attribute->title }}{{ $row->attribute->deleted != 0 ? '(đã bị xóa)': '' }}</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}"><i class="fa fa-edit"></i></button>
        <button class="btn btn-danger btn-outline delete-row" delele_id="{{$row->id }}"><i class="fa fa-trash"></i></button>
    </td>
</tr>