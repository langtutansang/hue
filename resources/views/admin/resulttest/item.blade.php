<tr id="row{{$row->id }}">
    <td>{{ $key+1 }}</td>
    <td>{{$row->date }}</td>
    <td>{{$row->test->title }}</td>
    <td>{{$row->users->name }}</td>
    <td>{{ $row->score  }} ({{$row->score >=5 ? 'Đạt' : 'Không đạt'}})</td>
</tr>