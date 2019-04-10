<tr id="row{{$row->id }}">
    <td>{{$row->id }}</td>
    <td><img class="image-product" src="{{ asset($row->picture)}}" alt=""></td>
    <td>{{$row->title }}</td>
    <td>{{ number_format($row->price, 2, '.', ',') }}đ</td>
    <td>{{number_format($row->sale, 2, '.', ',')  }}đ </td>
    <td>{{$row->brand->title }}</td>
    <td>
        <button class="btn btn-primary btn-outline edit-row" edit-id="{{$row->id }}" ><i class="fa fa-edit"></i></button>
        <button class="btn btn-danger btn-outline delete-row" delele_id="{{$row->id }}"><i class="fa fa-trash"></i></button>
    </td>
</tr>