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
                  <h4 class="card-title">{{ trans('Add Question-Answer')}}</h4>
                  <!-- <p class="card-category">Complete your Package</p> -->
               </div>
               <div class="card-body">
                  <!-- <form> -->
                  {!! Form::open(['route'=> array('admin.help.store'), 'id' => 'help_form']) !!}
                  <!-- --------------------------------- Name ------------------------------- -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('question',trans('Question'))}}</label>
                           {{Form::text('question','',['class'=>'form-control'])}}
                           @error('question')
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
                           <label class="bmd-label-floating">{{ Form::label('answer',trans('Answer'))}}</label>
                           {{Form::text('answer','',['class'=>'form-control'])}}
                           @error('answer')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  {{Form::submit( trans('Submit'), ['class'=>'btn btn-primary pull-right'])}}
                  {!!Form::close()!!}
                  <div class="clearfix"></div>
                  <!-- </form> -->
               </div>
            </div>
            <!-- --------------------------------- -->
            <div class="card">
               <div class="card-header card-header-primary">
                  <a href="{{ route('admin.help.index')}}">
                     <h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i> {{ trans('Show List For Question-Answer')}}</h4>
                  </a>
                  <!-- <p class="card-category">Complete your Package</p> -->
               </div>
            </div>
            <!-- --------------------------------- -->
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
<script>
   $(document).ready(function() {
      $('#help_form').validate({
         rules: {
            question: {
               required: true,
            },
            answer: {
               required: true,
            }
         },
         errorElement: 'span',
         messages: {
            question: "Please Enter Your Question",
            answer: "Please Enter Your Answer",
         },
      });
   });
</script>
@endpush