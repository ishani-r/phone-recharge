@extends('layouts.master')
@section('content')
<div class="content">
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ trans('Language')}}</h4>
                        <!-- <p class="card-category">Complete your Package</p> -->
                    </div>
                    <div class="card-body">
                        <div class="col-md-4">
                            <strong>{{ trans('Select Language:')}} </strong>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control Langchange">
                                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                                <option value="spanish" {{ session()->get('locale') == 'spanish' ? 'selected' : '' }}>Spanish</option>       
                            </select>
                        </div>
                        <h5 style="margin-top: 80px;">{{ __('message.welcome') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    var url = "{{ route('admin.LangChange') }}";
    $(".Langchange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>
@endpush