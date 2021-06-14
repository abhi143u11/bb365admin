@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
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
                                <h1 class="no-margins counter-count">{{ $todays_customers }}</h1>
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
                                <h1 class="no-margins counter-count">{{ $todays_orders }}</h1>
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
                                <h1 class="no-margins counter-count">{{ $todays_amount}}</h1>
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
                                <h1 class="no-margins counter-count">{{ $total_amount}}</h1>
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
                                <h1 class="no-margins counter-count">{{ $total_customers }}</h1>
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
                                <h1 class="no-margins counter-count">{{ $total_orders }}</h1>
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
                                T.Id
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
                              Payment Method
                            </th>
                            <th>
                                Total Amount
                            </th>

                        </thead>
                        <tbody>
                        @foreach ($todays_transaction as $bill)
                                <tr>
                                    <td>
                                        {{ $bill->transaction_id }}
                                    </td>
                                   
                                     <td data-sort="<?php echo strtotime($bill->bill_date); ?>">
                                        {{ date('d F Y', strtotime($bill->bill_date)) }}
                                        </td>
                                    <td>
                                   <p class="text-capitalize">{{ $bill->name }}</p>
                                    </td>
                                    <td>
                                        {{ $bill->mobile_number }}
                                    </td>
                                    <td>
                                        {{ $bill->payment_method }}
                                    </td>
                                    <td>
                                        {{ $bill->amount }}
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
    $('#myTable2').DataTable({
         buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
         "order": [[ 1, "desc" ]]
    });
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

    $('.counter-count').each(function() {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        }
    });
});

</script>

@endsection
