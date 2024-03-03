<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('user.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{route('user.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('user.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>Username</th>
			<td>{{$record->username}}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{$record->email}}</td>
		</tr>
		<tr>
			<th>Create Time</th>
			<td>{{$record->create_time}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
