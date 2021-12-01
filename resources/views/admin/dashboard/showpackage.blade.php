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
                            <td>{{$pre->name}}</td>
                        </tr>
                        <tr>
                            <td>6 Months</td>
                            <td>{{$pre->six_months}}</td>
                        </tr>
                        <tr>
                            <td>3 Months</td>
                            <td>{{$pre->three_months}}</td>
                        </tr>
                        <tr>
                            <td>1 Months</td>
                            <td>{{$pre->one_months}}</td>
                        </tr>
                        <tr>
                            <td>Try Days</td>
                            <td>{{$pre->try_days}}</td>
                        </tr>
                        <tr>
                            <td>Save</td>
                            <td>{{$pre->save}}</td>
                        </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <a href="{{ route('admin.premium.index')}}"><h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i>{{ trans(' Back')}}</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection