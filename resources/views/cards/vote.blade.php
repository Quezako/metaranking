<tr>
    <td>{{$record->user->name}}</td>
    <td>{{$record->tag->label ?? $record->tag->tag1->label . ' + ' . $record->tag->tag2->label}}</td>
    <td>{{$record->mood->label}}</td>
    <td>
        <div class="btn-group">
            <form onsubmit="return confirm('Are you sure you want to delete?')"
                action="{{route('vote.destroy', $record->id)}}"
                method="post"
                style="display: inline">
                {{csrf_field()}}
                {{method_field('DELETE')}}
            <a class="btn btn-secondary" href="{{route('vote.show', $record->id)}}">
                <span class="fa fa-eye"></span>
            </a>
            <a class="btn btn-secondary" href="{{route('vote.edit', $record->id)}}">
                <span class="fa fa-pencil"></span>
            </a>
                <button type="submit" class="btn btn-secondary cursor-pointer">
                    <i class="text-danger fa fa-remove"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
