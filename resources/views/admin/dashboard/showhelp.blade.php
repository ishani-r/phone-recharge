@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ trans('Show Question-Answer')}}</h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-dark table-striped">
                        <tr>
                            <td>{{ trans('Question')}}</td>
                            <td>{{$help->question}}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('Answer')}}</td>
                            <td>{{$help->answer}}</td>
                        </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <a href="{{ route('admin.help.index')}}"><h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i> {{ trans('Back')}}</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection