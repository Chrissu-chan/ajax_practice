@foreach($model as $row)
    <tr>
        <td>{!! $row->id !!}</td>
        <td>{!! $row->item !!}</td>
        <td>{!! $row->price !!}</td>
        <td>{!! $row->ammount !!}</td>
        <td>
            <a href="javascript:void[0]" class="btn btn-primary btn-sm">Edit</a> <span>|</span>
            <a href="javascript:void[0]" class="btn btn-danger btn-sm" onclick="destroy(<?= $row->id ?>)">Delete</a>
        </td>
    </tr>
@endforeach