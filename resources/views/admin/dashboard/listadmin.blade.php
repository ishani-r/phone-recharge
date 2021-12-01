<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ trans('Help Table')}}</h4>
                        <p class="card-category"> {{ trans('Here is a List for Question-Answer')}}</p>
                    </div>
                    @can('create-admin')
                    <div>
                        <a href="{{ route('admin.adminuser.create') }}" class="btn btn-success">{{ trans('Add Admin')}}</a>
                    </div>
                    @endcan
                    <div class="card-body">
                        <div class="table-responsive-sg">
                            {!! $dataTable->table()!!}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- <div class="card-header card-header-primary">
                        <a href="{{ route('admin.help')}}">
                            <h4 class="card-title"><i class="fa fa-hand-o-left" aria-hidden="true"></i> {{ trans('Add Question-Answer')}}</h4>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
{!! $dataTable->scripts() !!}
@endpush