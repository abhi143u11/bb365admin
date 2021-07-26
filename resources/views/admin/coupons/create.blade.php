@extends('layouts.master')

@section('title')
Coupons 
@endsection

@section('content')
<style>
.modal {
    z-index: 100000 !important;
}

.select2-container--open {
    z-index: 9999999 !important;
        width: 100% !important;
}

.select2-container{
        width: 100% !important;
}
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ action('CouponsController@store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="coupon_code"><b>Coupon Code:</b></label>
                        <input type="text" name="coupon_code" class="form-control" id="">
                    </div>


                    <div class="form-group">
                        <label for="coupon_type"><b>Coupon Type:</b></label>
                        <select class="form-control" name="coupon_type" id="coupon_type">
                        <option value="">Select Coupon Type</option>
                        <option value="percentage">Percentage</option>
                        <option value="amount">Amount</option>
                        </select>
                    </div>   


                    <div class="form-group">
                        <label for="max_discount"><b>Max Discount:</b></label>
                        <input type="text" name="max_discount" class="form-control" id="">
                    </div>

                       <div class="form-group">
                        <label for="minimum_price"><b>Minimum Cart Price:</b></label>
                        <input type="text" name="minimum_price" class="form-control" id="">
                    </div>

                    <div class="form-group">
                    <label for="name" class="col-form-label"><b>Customer:</b></label>
                    <select class="form-control" name="customer_id" id="customer">
                      <option value="0">All</option>
                            @foreach ($customers as $customer)
                            <option value="{{$customer['id']}}">
                                {{$customer['name']}}-{{ $customer['phone']}}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="status"><b>Coupon Status:</b></label>
                        <select class="form-control" name="status" id="status">
                        <option value="">Select Status</option>
                        <option value="0">In-Active</option>
                        <option value="1">Active</option> 
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </div>

        </div>
        </form>
    </div>
</div>

<!-- end  Modal -->
<!-- delete Modal -->
<div class="modal fade" id="deletemodalpop" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Coupon"; @endphp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delete_modal_Form" method="POST">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <div class="modal-body">
                    <input type="hidden" id="id">
                    <h5>Are You Sure Want To Delete This Data?</h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end delete Modal -->
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <h4 class="card-title">@yield('title')
                <button type="button" class="pull-right btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    + ADD @yield('title')
                </button>
            </h4>
</div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <th>
                           Coupon Code
                        </th>
                        <th>
                           Coupon Type
                        </th>
                        <th>
                           Max Discount
                        </th>
                        <th>
                           Minimum Price
                        </th>

                        <th>
                        Coupon Status
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                    @foreach ($coupons as $coupon)
                        <tr>
                            <td>
                                {{ $coupon->coupon_code}}
                            </td>
                            <td>
                                {{ $coupon->coupon_type }}
                            </td>
                            <td>
                                {{ $coupon->max_discount }}
                            </td>
                            <td>
                                {{ $coupon->minimum_price }}
                            </td>
                            <td>
                            @if($coupon->coupon_status==0)
                                <span class="label label-danger">In-Active</span> @else <span class="label label-info">Active</span>@endif
                            </td>
                            <td data-url="{{ url('coupons-delete/' . $coupon->id ) }}">
                                <a href="{{ url('coupons-edit/' . $coupon->id ) }}"
                                class="btn-sm btn btn-warning"
                                data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>  </a>

                                <a href="javascript:void(0)"
                                 class="btn-sm btn btn-danger deletebtn"
                                data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-danger" title="Delete"><i
                                        class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    $('#myTable').on('click', '.deletebtn', function() {

        $tr = $(this).closest('tr');
        var url = $(this).parent("td").data('url');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#delete_id').val(data[0]);

        $('#delete_modal_Form').attr('action', url);

        $('#deletemodalpop').modal('show');

    });
});

</script>

<script type="text/javascript">
$("#customer").select2();

$("#categoryid").select2();
$("#customername").select2();
    </script>

@endsection