<form action="{{isset($route)?$route:route('mood.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="label">Label</label>
        <input type="text" class="form-control {{ $errors->has('label') ? ' is-invalid' : '' }}" name="label" id="label" value="{{old('label',$model->label)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('label'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('label') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>