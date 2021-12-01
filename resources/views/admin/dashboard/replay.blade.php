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
                  <h4 class="card-title">{{ trans('Replay')}}</h4>
                  <p class="card-category">{{ trans('You Can Replay Here !!')}}</p>
               </div>
               <div class="card-body">
                  <!-- <form> -->
                  {!! Form::model($data,['route'=> array('admin.replayuser',$data->id), 'id' => 'replay_form']) !!}
                  @csrf
                  <!-- -------------------------------------- Name ------------------------------------ -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('subject', trans('Subject'))}}</label>
                           {{Form::text('subject',null,['class'=>'form-control'])}}
                           @error('subject')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('email', trans('Email'))}}</label>
                           {{Form::text('email',null,['class'=>'form-control'])}}
                           @error('email')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('message', trans('Messages'))}}</label>
                           {{Form::text('message',null,['class'=>'form-control'])}}
                           @error('message')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="bmd-label-floating">{{ Form::label('replay',trans('Replay'))}}</label>
                           {{Form::textarea('replay','',['class'=>'form-control'])}}
                           @error('replay')
                           <span role="alert">
                              <strong style="color:red;">{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  {{Form::submit( trans('Send'), ['class'=>'btn btn-primary pull-right replay'])}}
                  {!!Form::close()!!}
                  <div class="clearfix"></div>
                  <!-- </form> -->
               </div>
               <div class="card">
                  <div class="card-header card-header-primary">
                     <a href="{{ route('admin.showreplay')}}">
                        <h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i> {{ trans('List User Replay')}}</h4>
                     </a>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header card-header-primary">
                     <a href="{{ route('admin.contactus')}}">
                        <h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i> {{ trans('Back')}}</h4>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
<script>
   $(document).ready(function() {
      $('#replay_form').validate({
         rules: {
            subject: {
               required: true,
            },
            email: {
               required: true,
            },
            message: {
               required: true,
            },
            replay: {
               required: true,
            }
         },
         errorElement: 'span',
         messages: {
            subject: 'Enter Your Sublect !',
            email: 'Enter Your Email Address !',
            message: 'Enter Your Message !',
            replay: 'Enter Your Replay !',
         },
      });

      // $(document).on('click', '.replay', function() {
      //    var id = $(this).data('id');
      //    var url = '{{route("admin.deleteReplay", ":queryId")}}';
      //    url = url.replace(':queryId', id);
      //    var number = $(this).attr('id', 'asd');
      //    $.ajax({
      //       url: url,
      //       type: "POST",
      //       data: {
      //          id: id,
      //          _token: '{{ csrf_token() }}'
      //       },
      //       dataType: "json",
      //       success: function(data) {
      //          $('#replaydatatable-table').DataTable().ajax.reload();
      //       }
      //    });
      // });
   });
</script>
@endpush