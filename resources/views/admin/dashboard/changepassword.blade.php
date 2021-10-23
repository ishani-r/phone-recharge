@extends('layouts.master')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Change Password</h4>
            <p class="card-category">Complete your password</p>
          </div>
          <div class="card-body">
            <!-- <form> -->
              {!! Form::open(['route'=> array('admin.changepass',Auth::guard('admin')->user()->id),'files'=>'true']) !!}
              @csrf
              <!-- -------------------------------------- Name ------------------------------------ -->
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">{{ Form::label('current_password','Current Password')}}</label>
                    {{Form::text('current_password','',['class'=>'form-control'])}}
                    @if ($message = Session::get('error'))
                      <strong style="color: red;">{{ $message }}</strong>
                    @endif
                    @error('current_password')
                      <span role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">{{ Form::label('password','Password')}}</label>
                    {{Form::text('password','',['class'=>'form-control'])}}
                    @error('password')
                      <span role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- --------------------------------------- Image ----------------------------------------- -->
              <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                    <label class="bmd-label-floating">{{ Form::label('confirm_password','Confirm Password')}}</label>
                    {{Form::text('confirm_password','',['class'=>'form-control'])}}
                    @error('confirm_password')
                      <span role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              {{Form::submit('Update Profile', ['class'=>'btn btn-primary pull-right'])}}
              {!!Form::close()!!}
              <div class="clearfix"></div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection