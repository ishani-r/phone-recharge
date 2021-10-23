@extends('layouts.master')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Show Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <table class="table table-dark table-striped">
                  <tr>
                      <td>Name</td>
                      <td>{{$data->name}}</td>
                  </tr>
                  <tr>
                      <td>Mobile</td>
                      <td>{{$data->mobile}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$data->email}}</td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="{{asset('storage/admin/'.$data->image)}}" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category">CEO / Co-Founder</h6>
            <h4 class="card-title">Alec Thompson</h4>
            <p class="card-description">
              Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </p>
            <!-- <a href="#pablo" class="btn btn-primary btn-round">Follow</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
   <a href="{{ route('admin.dashboard.index') }}" class="btn btn-succes"><h4 class="card-title">Back</h4></a>
</div>
@endsection