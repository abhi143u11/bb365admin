
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BB365 - Brand Builder 365 | Invoice</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="white-bg">
                <div class="wrapper wrapper-content p-xl">
                    <div class="ibox-content p-xl">
                    <img src="{{url('uploads/mainlogo.png')}}" width="200px">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>From:</h5>
                                    <address>
                                        <strong>BB365 - Brand Builder 365.</strong><br>
                                        Anchroo Kalan
                                        Bulandshahr (U.P. – 202395) India
                                        <br>
                                        www.sun19.in<br>
                                        info@sun19.in
                                      <br>
                                        <u>Phone:</u>(+91) 6396046404
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy"><b>{{ $bills->id }}</b></h4>
                                    <span>To:</span>
                                    <address>
                                        <strong>{{ $bills->name }}</strong><br>
                                        {{ $bills->house_no }},{{ $bills->landmark }}
                                        {{ $bills->area }}<br>
                                         {{ $bills->city }}<br>
                                        {{ $bills->pincode }}<br>
                                        <u>Phone:</u>{{ $bills->mobile }}
                                    </address>
                                    <p>
                                        <span><strong>Invoice Date:</strong> {{  date("d-m-Y", strtotime($bills->bill_date)) }}</span><br/>
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Item List</th>
                                        <th>Quantity</th>
                                        <th>MRP</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($bills->billproduct  as $product)
                                    <tr>
                                        <td><div><strong> 
                                        {{$product->product_name}}
                                   </strong></div>
                                            </td>
                                        <td>  
                                        {{$product->quantity}}
                                   </td>
                                        <td>   
                                        {{$product->mrp}}
                                   </td>
                                        <td> 
                                        {{$product->sub_total}}
                                    </td>
                                    </tr>
                                    @endforeach 
                                    </tbody>
                                </table>
                            </div>

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>GST :</strong></td>
                                    <td>0.00</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>{{ $bills->total_amount }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="well m-t"><strong>Comments:-</strong>
                               Sun 19 Farms Team Thank You For The Order.Delivering Organic & Natural Food Products Every Time.
                            </div>
                        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
    
  
 

