<tr id="row{{$row->id }}">
    <td>{{$row->id }}</td>
    <td>{{$row->product->title }}</td>
    <td>{{$row->sold }}</td>
    <td>{{$row->inventory }}</td>
    <td>{{$row->cost }}đ</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}" ><i class="fa fa-edit"></i></button>
    </td>
</tr>