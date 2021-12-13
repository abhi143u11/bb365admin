@extends('layouts.master')

@section('title')
Bills

@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bills Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="biildetails col-md-12"></div>
                <div class="totalamount col-md-12"></div>
                <div class="transaction col-md-12"></div>

            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
</div>

<!-- end  Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Bill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bill.insert') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name"><b>Customer:</b></label>
                        <select class="form-control" name="name" id="customername">
                            <option value="">Select Customer</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id }} | {{ $customer->name }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mobile"><b>Mobile:</b></label>
                        <input type="text" name="mobile" class="form-control" id="mobile">
                    </div>

                    <div class="form-group">
                        <label for="area"><b>Area:</b></label>
                        <input type="text" name="area" class="form-control" id="area">
                    </div>

                    <div class="form-group">
                        <label for="state"><b>State:</b></label>
                        <input type="text" name="state" class="form-control" id="state">
                    </div>

                    <div class="form-group">
                        <label for="city"><b>City:</b></label>
                        <input type="text" name="city" class="form-control" id="city">
                    </div>

                    <div class="form-group">
                        <label for="date"><b>Bill Date:</b></label>
                        <input type="date" name="date" class="form-control" value="<?php echo date("Y-m-d") ?>" id="date">
                    </div>

                    <div class="form-group">
                        <label for="pincode"><b>Pincode:</b></label>
                        <input type="number" name="pincode" class="form-control" id="pincode">
                    </div>

                    <div class="form-group">
                        <label for="status"><b>Status:</b></label>
                        <select class="form-control" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="Ordered">Ordered</option>
                            <option value="InProgress">InProgress</option>
                            <option value="Delivering">Delivering</option>
                            <option value="Delivered">Delivered </option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="coupon_code"><b>Coupon Code:</b></label>
                        <input type="text" name="coupon_code" class="form-control" id="coupon_code">
                    </div>

                    <div class="form-group">
                        <label for="discount"><b>Discount:</b></label>
                        <input type="text" name="discount" class="form-control" id="discount">
                    </div>

                    <div class="form-group">
                        <label for="notes"><b>Notes:</b></label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
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
<!-- end ----Modal -->

<!-- Delete confirmation Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Bill"; @endphp</h5>
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
<!-- delete data model end -->
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <h4 class="card-title">@yield('title')
            </h4>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">

                <table class="table table-striped" id="bills">
                    <thead>
                        <th>
                            Bill Id
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Mobile
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Total Amount
                        </th>
                        <th>
                            Bill Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                        <tr>
                            <td>
                                {{ $bill->id }}
                            </td>
                            <td>
                                {{ $bill->name }}
                            </td>
                            <td>
                                {{ $bill->mobile }}
                            </td>
                            <td>
                                {{ $bill->house_no }},{{ $bill->landmark }},
                                {{ $bill->area }},
                                {{ $bill->city }},
                                {{ $bill->pincode }}
                            </td>
                            <td>
                                {{ $bill->total_amount }}
                            </td>
                            <td>
                                {{ $bill->bill_date }}
                            </td>
                            <td>
                                <span style="display:inline-block; width:90px" class="label"> {{ $bill->status }}</span>
                            </td>
                            <td>
                                @if($bill->status !='Delivered' && $bill->status!='Cancel')
                                <a href="javascript:void(0)" billid="{{ $bill->id }}" class="btn-sm btn btn-danger delivered" style="background-color: #363f50 !important; color:black !important" data-toggle="tooltip" data-placement="top" title="Delivered"><i class="fa fa-truck"></i> </a>
                                @endif

                                <a href="javascript:void(0)" billid="{{ $bill->id }}" class="btn-sm btn btn-danger viewdetails" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i> </a>

                                @if($bill->status!='Delivered' && $bill->status!='Cancel')
                                <a href="{{ url('bill-edit/' . $bill->id) }}" class="btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit"></i> </a>
                                @endif
                                <a href="{{ url('invoice/'.$bill->id) }}" data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-info" title="Print"><i class="fa fa-print"></i> </a>
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

<script type="text/javascript">
    // $(function () {
    //      $.ajaxSetup({
    //          headers: {
    //              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //          }
    //    });

    //  var table = $('#mytable1').DataTable({
    //         processing: false,
    //         serverSide: false,
    //         ajax: "{{ route('bill.index') }}",
    //         columns: [
    //             {data: 'id', name: 'id'},
    //             {data: 'name', name: 'name'},
    //             {data: 'mobile', name: 'mobile'},
    //             {data: 'area', name: 'area'},
    //             {data: 'state', name: 'state'},
    //             {data: 'city', name: 'city'},
    //             {data: 'total_amount', name: 'total_amount'},
    //             {data: 'bill_date', name: 'bill_date'},
    //             {data: 'status', name: 'status'},
    //             {data: 'action', name: 'action', orderable: false, searchable: true},
    //         ]
    //     });
    //     });

    jQuery(document).on('click', '.viewdetails', function() {
        var billid = jQuery(this).attr('billid');
        // alert(billid);
        $('#showmodal').modal('show');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'getbilldata/' + billid,
            dataType: "json",
            success: function(data) {
                var listItems1 = data[0];
                var listItems2 = data[1];
                var listItems3 = data[2];
                console.log(listItems3);
                $(".biildetails").html(listItems1);
                $(".totalamount").html(listItems2);
                $(".transaction").html(listItems3);
            }
        });
    });

    jQuery(document).on('click', '.delivered', function() {
        var billid = jQuery(this).attr('billid');
        // alert(billid);
        // $('#showmodal').modal('show');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'bill-status/' + billid,
            dataType: "json",
            success: function(data) {
                // location.reload(true);
                alert('Order Is Delivered');
                setTimeout(function() {
                    location.reload();
                }, 5000)
                //  console.log(data);
                //  var listItems = data;
            }
        });
    });

    $(document).ready(function() {
        $('#bills').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>

@endsection