@extends('layouts.app')
@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
               <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger text-center">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
               <p>{{ Session::get('error') }}</p>
            </div>
            @endif
            <div class="card-header">{{ __('You can create post Here') }}</div>

            <div class="card-body">

               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  Create Post
               </button>
               <!-- Points -->
               <div class="text-right">
                  <a href="{{ route('send_request')}}" type="submit" class="btn btn-primary">
                     Send Request
                  </a>

                  <h5>If you get 300 or more than 300 points,
                     </br> you will be able to send recharge Request</h5>
                  <?php
                  $total_point = App\Models\Point::where('user_id', Illuminate\Support\Facades\Auth::Guard('web')->user()->id)->first();
                  ?>
                  <h3>Your Points = {{$total_point->total_point}}</h3>
               </div>

               <!-- Modal -->
               <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Create Post</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="{{ route('add_post')}}" id="create_post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                 <label>Title Name</label>
                                 <input type="text" id="title_name" name="title_name" class="form-control @error('title_name') is-invalid @enderror" placeholder="Enter Post Title">
                                 @error('title_name')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label>Image</label>
                                 <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Enter Post Title">
                                 @error('image')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary asd" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </br>
         <div class="card">
            <?php
            $showpost = App\Models\Post::where('user_id', Illuminate\Support\Facades\Auth::Guard('web')->user()->id)->get();
            ?>
            @foreach($showpost as $name)
            <div class="card-header">{{$name->title_name}}</div>
            <div class="card-body">
               <img src="{{ asset('storage/admin/'.$name->image)}}" width="90px" alt="" class="img-responsive">
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
<script>
   $(document).ready(function() {
      $('#create_post').validate({
         rules: {
            title_name: {
               required: true,
            },
         },
         messages: {
            title_name: "Please Enter Your Name",

         },
         highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
         },
         unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
         },

      });

      $('.asd').click(function() {
         $('.error').html('');
         $('input').removeClass('is-invalid');
      });
      $('.close').click(function() {
         $('.error').html('');
         $('input').removeClass('is-invalid');
      });
   });
</script>
@endpush