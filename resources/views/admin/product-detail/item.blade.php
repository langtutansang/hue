<tr id="row{{$row->id }}">
    <td>{{$row->id }}</td>
    <td>{{$row->title }}</td>
    <td>{{ $row->product->title }}{{ $row->product->deleted != 0 ? '(đã bị xóa)': '' }}</td>
    <td>Click sửa để xem Chi tiết</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}"><i class="fa fa-edit"></i></button>
    </td>
</tr>