@extends('layouts.app')
@section('title', "Operators Trash")

@section('content')
<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<style>

/* Important part */

.modal-body{
    height: 60vh;
    overflow-y: auto;
}
    
</style>

        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Icon</th>
                                    <th style="text-align:center">Name</th>
                                    <th style="text-align:center">Status</th>
                                    <th style="text-align:center">Created at</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    @if(!empty($operator_data))
                                    @foreach($operator_data as $value)
                                    
                                    <tr>
                                        <td style="text-align:center">
                                            <img src="{{$value->operator_logo}}" alt="{{$value->operator_name}}" title="{{$value->operator_name}}" class="rounded mr-3" height="40">
                                        </td>
                                        <td style="text-align:center">{{$value->operator_name}}</td>
                                        <td style="text-align:center">{{$value->active_status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td style="text-align:center">{{date("d-m-Y -- H:i:s", strtotime($value->created_at))}}</td>
                                        <td style="text-align:center">
                                            <a class="btn btn-outline-secondary btn-sm" id="restore_operator" data-id="{{$value->id}}" title="Delete">
                                                <i class="bx bx-reset"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

<!-- Transaction Modal -->
<div id="apnModal" class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">APN Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
@endsection

@section('header')
<!-- DataTables -->
<link href="{{asset('/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Sweet Alert-->
<link href="{{asset('/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('footer')
<!-- Required datatable js -->
<script src="{{asset('/backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/backend/js/pages/datatables.init.js')}}"></script>  
<!-- Sweet Alerts js -->
<script src="{{asset('/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script>

var table =  $("#datatable").DataTable();

$(document).on('click', '#restore_operator', function(){
    var id = $(this).attr("data-id");
    var row = $(this).closest('tr');
    Swal.fire({
          title: "Are you sure?",
//          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: !0,
          confirmButtonColor: "#34c38f",
          cancelButtonColor: "#f46a6a",
          confirmButtonText: "Yes, Restore it!",
        }).then(function (respose) {
            if(respose.isConfirmed){
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                    url: baseurl + "ajaxRestoreOperator",
                    data: {'id': id},
                    success: function (response) {
                        if(response == 1){
                            Swal.fire("Restored !", "Your record has been Restored.", "success");
                            table.row( row ).remove().draw();
                        }else{
                            Swal.fire("Restored !", "Your file has been Restored.", "success");
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
