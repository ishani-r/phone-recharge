@extends('layouts.master')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <!-- <form> -->
              {!! Form::model($set,['route'=> array('admin.setting.update',$set->id)]) !!}
              @csrf
              @method('put')
              <!-- -------------------------------------- Name ------------------------------------ -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">{{ Form::label('terms_and_conditions','terms_and_conditions')}}</label>
                    {{Form::textarea('terms_and_conditions',null,['class'=>'form-control','placeholder'=>'terms_and_conditions'])}}
                    @error('terms_and_conditions')
                      <span role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">{{ Form::label('privacy_policy','privacy_policy')}}</label>
                    {{Form::textarea('privacy_policy',null,['class'=>'form-control','placeholder'=>'privacy_policy'])}}
                    @error('privacy_policy')
                      <span role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              {{Form::submit('Update', ['class'=>'btn btn-primary pull-right'])}}
              {!!Form::close()!!}
              <div class="clearfix"></div>
            <!-- </form> -->
          </div>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
                <a href="{{ route('admin.setting.index')}}"><h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i> {{ trans('Back')}}</h4></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection