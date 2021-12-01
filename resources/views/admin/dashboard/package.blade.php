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
                  <h4 class="card-title">{{ trans('Add Package')}}</h4>
                  <p class="card-category">{{ trans('Complete your Package')}}</p>
               </div>
               <div class="card-body">
               <!-- <form> -->
                  {!! Form::open(['route'=> array('admin.premium.store'), 'id' => 'package_form']) !!}
                  @csrf
                  <!-- -------------------------------------- Name ------------------------------------ -->
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('name', trans('Package Name'))}}</label>
                           {{Form::text('name','',['class'=>'form-control'])}}
                           @error('name')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <!-- -------------------------------------- Save ------------------------------------ -->
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('save', trans('Save'))}}</label>
                           {{Form::text('save','',['class'=>'form-control'])}}
                           @error('save')
                              <span role="alert">
                                 <strong style="color:red;">{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- -------------------------------------- Six Month ------------------------------------ -->
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('six_months', trans('Six Month'))}}</label>
                           {{Form::text('six_months','',['class'=>'form-control'])}}
                           @error('six_months')
                              <span role="alert">
                                 <strong style="color:red;">{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>
                     <!-- ----------------------------------- Three Month ------------------------------------- -->
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('three_months', trans('Three Month'))}}</label>
                           {{Form::text('three_months','',['class'=>'form-control'])}}
                           @error('three_months')
                              <span role="alert">
                                 <strong style="color:red;">{{ $message }}</strong>
                              </span>
                        @enderror
                        </div>
                     </div>
                     <!-- ----------------------------------- One Month ------------------------------------- -->
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('one_months', trans('One Month'))}}</label>
                           {{Form::text('one_months','',['class'=>'form-control'])}}
                           @error('one_months')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- ----------------------------------- Try Days ------------------------------------- -->
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('try_days', trans('Try Days'))}}</label>
                           {{Form::text('try_days','',['class'=>'form-control'])}}
                           @error('try_days')
                              <span role="alert">
                                 <strong style="color:red;">{{ $message }}</strong>
                              </span>
                        @enderror
                        </div>
                     </div>
                  </div>
                  {{Form::submit( trans('Add Package'), ['class'=>'btn btn-primary pull-right'])}}
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
@push('js')
<script>
   $(document).ready(function(){
      $('#package_form').validate({
         rules: {
            name: {
               required: true,
            },
            six_months: {
               required: true,
            },
            three_months: {
               required: true,
            },
            one_months: {
               required: true,
            },
            try_days: {
               required: true,
            },
            save: {
               required: true,
            },
         },
         errorElement: 'span',
         messages: {
            name: 'Please Enter Package Name',
            six_months: 'Please Enter six Months Package Price.',
            three_months: 'Please Enter three Months Package Price.',
            one_months: 'Please Enter one Months Package Price.',
            try_days: 'Please Enter day for free trial.',
            save: 'Please Enter Persantage for save many.',
         },
      });
   });
</script>
@endpush