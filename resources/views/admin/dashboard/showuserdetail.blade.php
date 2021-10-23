@extends('layouts.master')
@section('content')
<div class="content">
   <div class="row">
      <div class="col-md-5">
         @foreach($user['user'] as $user['user'])
            <div class="card">
               <div class="card-header card-header-primary">
                  <h4 class="card-title">Show User Detail</h4>
                  <p class="card-category">Complete your profile</p>
               </div>
               <div class="card-body">
                  <center><img src="{{asset('storage/admin/'.$user['user']->image)}}" class="rounded-circle" width="200px"></center>
                     <table class="table table-dark table-striped">
                        <tr>
                           <td>Name</td>
                           <td>{{$user['user']->name}}</td>
                        </tr>
                        <tr>
                           <td>Name</td>
                           <td>{{$user['user']->image}}</td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         @endforeach
         <div class="col-md-6">
            <div class="card">
               <div class="card-header card-header-primary">
                  <h4 class="card-title">Show User Personal Detail</h4>
                  <p class="card-category">Complete your profile</p>
               </div>
               <div class="card-body">
                  <table class="table table-dark table-striped">
                     <tr>
                        <td>Education</td>
                        <td>{{$user['data']->education}}</td>
                     </tr>
                     <tr>
                        <td>Work</td>
                        <td>{{$user['data']->work}}</td>
                     </tr>
                     <tr>
                        <td>Employer</td>
                        <td>{{$user['data']->employer}}</td>
                     </tr>
                     <tr>
                        <td>About me</td>
                        <td>{{$user['data']->about_me}}</td>
                     </tr>
                     <tr>
                        <td>Height</td>
                        <td>{{$user['data']->height}}</td>
                     </tr>
                     <tr>
                        <td>Speaks</td>
                        <td>{{$user['data']->speaks}}</td>
                     </tr>
                     <tr>
                        <td>Cast</td>
                        <td>{{$user['data']->cast}}</td>
                     </tr>
                     <tr>
                        <td>Smoking</td>
                        <td>{{$user['data']->smoking}}</td>
                     </tr>
                     <tr>
                        <td>Drinks</td>
                        <td>{{$user['data']->drinks}}</td>
                     </tr>
                     <tr>
                        <td>Food</td>
                        <td>{{$user['data']->food}}</td>
                     </tr>
                     <tr>
                        <td>When to marry year</td>
                        <td>{{$user['data']->marray_age}}</td>
                     </tr>
                     <tr>
                        <td>Dressing</td>
                        <td>{{$user['data']->dressing}}</td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
   </div>
</div>
<div class="row">
   <a href="{{ route('admin.details.index') }}" class="btn btn-succes"><h4 class="card-title">Back</h4></a>
</div>
@endsection