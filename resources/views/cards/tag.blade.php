<tr>
    <td>{{$record->label}}</td>
    <td>{{$record->tag1->label ?? ''}}</td>
    <td>{{$record->tag2->label ?? ''}}</td>
    <td>
        <a href="{{route('tag.show',$record->id)}}"> {{$record->id}}</a>
        <a class="btn btn-secondary" href="{{route('tag.edit',$record->id)}}">
            <span class="fa fa-pencil"></span>
        </a>
        <form onsubmit="return confirm('Are you sure you want to delete?')"
            action="{{route('tag.destroy',$record->id)}}"
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