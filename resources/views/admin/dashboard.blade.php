@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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

    <div class="row">

    <div class="col-lg-3">
                       <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-danger float-right">Total</span>
                                </div>
                                <h5>Todays Customers</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{ $todays_customers }}</h1>
                                <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-danger float-right">Total</span>
                                </div>
                                <h5>Todays Orders</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{ $todays_orders }}</h1>
                                <div class="stat-percent font-bold text-danger"><i class="fa fa-bolt"></i></div>
                            </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                       <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Total</span>
                                </div>
                                <h5>Todays Amount</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₹ {{ number_format((float)$todays_amount,2, ',', '') }}</h1>
                                <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-info float-right">Total</span>
                                </div>
                                <h5>Total Amount</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₹{{ number_format((float)$total_amount,2,',', '') }}</h1>
                                <div class="stat-percent font-bold text-warning"><i class="fa fa-bolt"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                     <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Total</span>
                                </div>
                                <h5>Total Customers</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{ $total_customers }}</h1>
                                <div class="stat-percent font-bold text-info"><i class="fa fa-bolt"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-warning float-right">Total</span>
                                </div>
                                <h5>Total Orders </h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{ $total_orders }}</h1>
                                <div class="stat-percent font-bold text-info"><i class="fa fa-bolt"></i></div>
                            </div>
                        </div>
                    </div>
                 </div>
                 
<div class="row">
                    <div class="col-lg-12">
                       <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Todays Orders</h5>
                            </div>

  <div class="ibox-content">
          <table class="table" id="myTable2">
                    <thead>
                            <th>
                                Order Id
                            </th>
                            <th>
                                Bill Date
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Mobile
                            </th>
                            <th>
                                Area
                            </th>
                            <th>
                                Total Amount
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                        @foreach ($todays_transaction as $bill)
                                <tr>
                                    <td>
                                        {{ $bill->id }}
                                    </td>
                                    <td>
                                      {{ \Carbon\Carbon::parse($bill->bill_date)->format('d/m/Y')}}
                                    </td>
                                    <td>
                                   <p class="text-capitalize">{{ $bill->name }}</p>
                                    </td>
                                    <td>
                                        {{ $bill->mobile }}
                                    </td>
                                    <td>
                                        {{ $bill->area }}
                                    </td>
                                    <td>
                                        {{ $bill->amount }}
                                    </td>
                                    <td>
                                    <a href="javascript:void(0)" billid="{{ $bill->id }}"
                                        class="btn-sm btn btn-danger viewdetails"
                                        data-toggle="tooltip" data-placement="top"  title="View"><i
                                        class="fa fa-eye"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>

                </div>
                </div></div> 
                </div>


@endsection

@section('scripts')

<script type="text/javascript">
    jQuery(document).on('click', '.viewdetails', function () {
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


$(document).ready(function() {
    $('#myTable2').DataTable();
});

// function Graph() {
//     var data = "";
//     $.ajax({
//         type: 'POST',
//         url: 'data.aspx/getGraph',
//         dataType: 'json',
//         async: false,
//         contentType: "application/json; charset=utf-8",
//         data: {},
//         success: function (result) {
//             data = $.parseJSON(result.d);
//         },
//         error: function (xhr, status, error) {
//             alert(error);
//         }
//     });

//     return data;
// }

</script>

@endsection
