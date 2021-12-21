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
                        <h4 class="card-title">{{ trans('Point Table')}}</h4>
                        <p class="card-category"> {{ trans('Here is a List for Users Points')}}</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive-sg">
                            {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
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
    $(document).load(function(){
        alert('ishani');
    });
    // ---------------------------------------status-----------------------------
    $(document).on('click', '.status', function() {
        alert(1);
      var id = $(this).data('id');
      var number = $(this).attr('id', 'asd');
      $.ajax({
         url: "{{route('admin.request_status')}}",
         type: 'get',
         data: {
            id: id,
         },
         dataType: "json",
         success: function(data) {
            $("#asd").removeAttr("class");
            if (data.status == "Active") {
               $("#asd").addClass("badge rounded-pill bg-success status");
            } else {
               $("#asd").addClass("badge rounded-pill bg-danger status");
            }
            $("#asd").html(data.status);
            $('#settingdatatable-table').DataTable().ajax.reload();
         }
      })
   });    
</script>
{!! $dataTable->scripts() !!}
@endpush