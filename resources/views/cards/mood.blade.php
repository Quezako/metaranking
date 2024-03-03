
<tr>
    <td>{{$record->label}}</td>
    <td>
        <div class="btn-group">
            <form onsubmit="return confirm('Are you sure you want to delete?')"
                action="{{route('mood.destroy',$record->id)}}"
                method="post"
                style="display: inline">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a class="btn btn-secondary" href="{{route('mood.show',$record->id)}}">
                    <span class="fa fa-eye">
                </a>
                <a class="btn btn-secondary" href="{{route('mood.edit',$record->id)}}">
                    <span class="fa fa-pencil"></span>
                </a>
                <button type="submit" class="btn btn-secondary cursor-pointer">
                    <i class="text-danger fa fa-remove"></i>
                </button>
            </form>
        </div>
    </td>
</tr>