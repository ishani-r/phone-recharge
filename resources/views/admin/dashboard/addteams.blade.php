@extends('layouts.master')
@push('css')
   <style>
      .error {
         color: red;
      }
   </style>
@endpush
@section('content')
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header card-header-primary">
                  <h4 class="card-title">{{ trans('Teams And Condition')}}</h4>
                  <!-- <p class="card-category">Complete your Package</p> -->
               </div>
               <div class="card-body">
               <!-- <form> -->
                  {!! Form::open(['route'=> array('admin.setting.store'), 'id' => 'teams_form']) !!}
                  <!-- --------------------------------- Name ------------------------------- -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('terms_and_conditions',trans('Teams And Condition'))}}</label>
                           {{Form::textarea('terms_and_conditions','',['class'=>'form-control'])}}
                           @error('terms_and_conditions')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('privacy_policy',trans('Privacy Policy'))}}</label>
                           {{Form::textarea('privacy_policy','',['class'=>'form-control'])}}
                           @error('privacy_policy')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  {{Form::submit( trans('Add'), ['class'=>'btn btn-primary pull-right'])}}
                  {!!Form::close()!!}
                  <div class="clearfix"></div>
               <!-- </form> -->
               </div>
            </div>
            <div class="card">
               <div class="card-header card-header-primary">
                  <a href="{{ route('admin.setting.index')}}"><h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i> {{ trans('List Teams And Condition/Privacy Policy')}}</h4></a>
                  <!-- <p class="card-category">Complete your Package</p> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
<script>
   $(document).ready(function(){
      $('#teams_form').validate({
         rules: {
            terms_and_conditions: {
               required: true,
            },
            privacy_policy: {
               required: true,
            }
         },
         errorElement: 'span',
         messages: {
            terms_and_conditions: 'Enter Teams And Conditions',
            privacy_policy: 'Enter Privacy Policy',
         },
      });
   });
</script>
@endpush