<tr id="row{{$row->id }}">
    <td class=" details-control"> 
       {{$row->id }}
    </td>
    <td>{{$row->users ? $row->users->email : 'Khách ẩn danh' }}</td>
    <td>{{$row->created_at }}</td>
    <td>{{ $row->status == 0 ? 'Đợi duyệt' : ($row->status == 1 ? 'Đã duyệt' : 'Đã hủy')  }}</td>
    <td>{{ $row->paid == 0 ? 'Đợi thanh toán' : 'Đã thanh toán'  }}</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}"><i class="fa fa-eye"></i></button>
    </td>
</tr>