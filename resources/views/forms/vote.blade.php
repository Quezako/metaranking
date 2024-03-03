<form action="{{isset($route)?$route:route('vote.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
      <label for="tag_id">Tag  Id</label>
      <select class="form-control {{ $errors->has('tag_id') ? ' is-invalid' : '' }}" name="tag_id" id="tag_id">
          @if(isset($tag))
            @foreach ($tag as $data)
              <option value="{{$data->id}}" {{$data->id==$model->tag_id?'selected':''}}>{{$data->label ?? $data->tag1->label . ' + ' . $data->tag2->label}}</option>
            @endforeach
          @endif

      </select>
        @if($errors->has('tag_id'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('tag_id') }}</strong>
      </div>
    @endif
  </div>

  <div class="form-group">
      <label for="mood_id">Mood Id</label>
      <select class="form-control {{ $errors->has('mood_id') ? ' is-invalid' : '' }}" name="mood_id" id="mood_id">
          @if(isset($mood))
            @foreach ($mood as $data)
            <option value="{{$data->id}}" {{$data->id==$model->mood_id?'selected':''}}>{{$data->label}}</option>
            @endforeach
          @endif
      </select>
      @if($errors->has('mood_id'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('mood_id') }}</strong>
      </div>
      @endif
    </div>

    <div class="form-group">
      @if($errors->has('user_id'))
      <div class="invalid-feedback">
        <strong>{{ $errors->first('user_id') }}</strong>
      </div>
      @endif
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>
    </div>
</form>