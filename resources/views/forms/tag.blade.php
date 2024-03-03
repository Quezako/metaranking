<form action="{{isset($route)?$route:route('tag.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="label">Label</label>
        <input type="text" class="form-control {{ $errors->has('label') ? ' is-invalid' : '' }}" name="label" id="label" value="{{old('label',$model->label)}}" placeholder="" maxlength="255" >
          @if($errors->has('label'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('label') }}</strong>
    </div>
  @endif
    </div>

<div class="form-group">
    <label for="tag1_id">Tag1 Id</label>
    <select class="form-control {{ $errors->has('tag1_id') ? ' is-invalid' : '' }}" name="tag1_id" id="tag1_id">
        <option value=""></option>
        @if(isset($tag))
@foreach ($tag as $data)
<option value="{{$data->id}}" {{$data->id==$model->tag1_id?'selected':''}}>{{$data->label}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('tag1_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('tag1_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="tag2_id">Tag2 Id</label>
    <select class="form-control {{ $errors->has('tag2_id') ? ' is-invalid' : '' }}" name="tag2_id" id="tag2_id">
        <option value=""></option>
        @if(isset($tag))
@foreach ($tag as $data)
<option value="{{$data->id}}" {{$data->id==$model->tag2_id?'selected':''}}>{{$data->label}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('tag2_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('tag2_id') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>