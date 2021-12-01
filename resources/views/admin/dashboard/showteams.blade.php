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
                            <td>Teams And Condition</td>
                            <td>{{$set->terms_and_conditions}}</td>
                        </tr>
                        <tr>
                            <td>Privacy Policy</td>
                            <td>{{$set->privacy_policy}}</td>
                        </tr>
                        </table>
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