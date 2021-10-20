Ishani Ranpariya
Work Report 14/10/2021
-	login and logout complete
- setup admin panel complete
- Edit admin profile complete
- solve some error

Ishani Ranpariya
MR :: 15/10/2021

Today I am Working on below points
- working on User Module
- working on Admin Module
- edit profile using blade templete

Ishani Ranpariya
Work Report 15/10/2021
- apply edit profile in blade templete form
- display user data
- install yajra data table and display 
- Edit profile in display image, update image, replace image complete
- user table in show data working
- solve yajra datatable in error
- solve css error
- solve script error

IshaniRanpariya
MR :: 17/10/2021

Today I am Working on below points
  - Working on user module
  - change password 

Ishani Ranpariya
Work Report 18/10/2021
- user only show profile complete
- user edit data complete
- admin change password working
- install xampp in pc and setup
- install composer and solve error for path
- solve some error

Ishani Ranpariya
Work Report 19/10/2021
- set validation on edit user
- set validation on edit admin profile
- User module in show function perform using repository
- solve some error

Ishani Ranpariya
MR :: 20/10/2021

Today I am Working on below point
 - User modul perform using api
 - solve previous error
<!-- ------------------------------------------------------------------------ -->
@extends('layouts.master')
@section('content')
<div class="content-wrapper">
<h1>Edit Profile</h1>
{!! Form::open() !!}

@csrf


<div class="form-group">
{{ Form::label('name','Name')}}
{{Form::text('name',Auth::guard('admin')->user()->name,['class'=>'form-control','placeholder'=>'Name'])}}
</div>
<br>

<div class="form-group">
{{ Form::label('mobile','Mobile')}}
{{Form::text('mobile',Auth::guard('admin')->user()->mobile,['class'=>'form-control','placeholder'=>'mobile'])}}
</div>
<br>

<div class="form-group">
{{ Form::label('address','Address')}}
{{Form::text('address',Auth::guard('admin')->user()->address,['class'=>'form-control','placeholder'=>'address'])}}
</div>
<br>

<div class="form-group">
{{ Form::label('email','Email')}}
{{Form::text('email',Auth::guard('admin')->user()->email,['class'=>'form-control','placeholder'=>'email'])}}
</div>
<br>

<div class="form-group">
{{ Form::label('image','Resume Upload')}}<br>
<img src="img_chania.jpg" alt="Flowers in Chania" width="460" height="345"></br>
{{Form::file('image')}}
</div>
<br>
{{Form::submit('Submit', ['class'=>'btn btn-primary btn-lg'])}}
{!!Form::close()!!}
</div>
@endsection


Yajra Datatable

step 1 : composer require yajra/laravel-datatables-oracle:"~9.0"

step 2 :
config/app.php
 'providers' => [
   Yajra\Datatables\DatatablesServiceProvider::class,
],
 'aliases' => [
  'Datatables' => Yajra\Datatables\Facades\Datatables::class,
] 

step 3 : composer require yajra/laravel-datatables:^1.5

step 4 : php artisan vendor:publish --tag=datatables
step 4 : php artisan datatables:make DataTable_Name