<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Tag</th>
        <th>Mood</th>
        <th>User</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>
        <td> {{$record->tag_id }} </td>
        <td> {{$record->mood_id }} </td>
        <td> {{$record->user_id }} </td>
        <td>
            <a class="btn btn-secondary" href="{{route('vote.show', $record->id)}}">
            <span class="fa fa-eye"></span>
            </a><a class="btn btn-secondary" href="{{route('vote.edit', $record->id)}}">
                <span class="fa fa-pencil"></span>
            </a>
            <form onsubmit="return confirm('Are you sure you want to delete?')"
                action="{{route('vote.destroy', $record->id)}}"
                method="post"
                style="display: inline">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-secondary cursor-pointer">
                    <i class="text-danger fa fa-remove"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">
            {{{$records->render()}}}
        </td>
    </tr>
    </tfoot>
</table>