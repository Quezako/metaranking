<form action="{{isset($route)?$route:route('user.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="username" value="{{old('username',$model->username)}}" placeholder="" maxlength="16" required="required" >
          @if($errors->has('username'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('username') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{old('email',$model->email)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('email'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="create_time">Create Time</label>
    <div class="input-group">
        <input type="datetime" class="form-control {{ $errors->has('create_time') ? ' is-invalid' : '' }}" name="create_time" id="create_time"
               value="{{old('create_time',$model->create_time)}}"
               placeholder="" required="required" >
        <div class="input-group-addon">
            <label for="create_time" class="fa fa-calendar">
            </label>
        </div>
    </div>
      @if($errors->has('create_time'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('create_time') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>