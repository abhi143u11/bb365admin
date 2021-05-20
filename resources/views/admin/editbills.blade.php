@extends('layouts.master')

@section('title')
    Edit Bills 
@endsection

@section('content')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('BillProductController@insert') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="bill_id" value="{{ $bills->id }}">
                        <div class="form-group">
                        
                            <label for="category_id"><b>Product:</b></label>
                            <select class="form-control" name="product_name" id="productname">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->product_id }} | {{ $product->product_name }}">{{ $product->product_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_id"><b>Category:</b></label>
                            <select class="form-control" name="category_id" id="categoryid">
                                <option value="">Select Category</option>
                                @foreach ($categories as $value)
                                <option value="{{ $value->id }}">{{ $value->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    
                       <div class="form-group">
                            <label for="mrp"><b>MRP:</b></label>
                            <input type="text" name="mrp" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label for="size"><b>Size:</b></label>
                            <input type="text" name="size" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label for="quantity"><b>Quantity:</b></label>
                            <input type="text" name="quantity" class="form-control" id="quantity">
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
  <div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Brand"; @endphp</h5>
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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{ url('bill-update/' . $bills->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $bills->id }}">

                            <div class="row">
                                    <div class="form-group col-md-4">
                                    <label for="name" class="col-form-label"><b>Customer:</b></label>
                                    <select class="form-control" name="name" id="" disabled="disabled">
                                            @foreach ($customers as $customer)
                                            <option value="{{$customer['id']}} | {{ $customer['name'] }}"
                                                {{ $customer['id'] == $bills->customer_id ? 'selected="selected"' : '' }}>
                                                {{$customer['name']}}</option>
                                            @endforeach
                                       </select>
                                    </div>

                                <div class="form-group col-md-4">
                                <label for="mobile"><b>Mobile:</b></label>
                                <input type="text" name="mobile" class="form-control" id="" value="{{  $bills->mobile }}" readonly>
                             </div>

                             <div class="form-group col-md-4">
                                <label for="status"><b>Status:</b></label>
                                <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>                               
                                    <option value="Ordered" {{ $bills->status  == "Ordered" ? 'selected="selected"' : '' }}>Ordered</option>  
                                    <option value="InProgress" {{ $bills->status  == "InProgress" ? 'selected="selected"' : '' }}>InProgress</option>  
                                    <option value="Delivering" {{ $bills->status  == "Delivering" ? 'selected="selected"' : '' }}>Delivering</option>  
                                    <option value="Delivered" {{ $bills->status  == "Delivered" ? 'selected="selected"' : '' }}>Delivered </option>  
                                    <option value="Cancel" {{ $bills->status  == "Cancel" ? 'selected="selected"' : '' }}>Cancel</option>  
                                </select>
                            </div>

                                <div class="form-group col-md-4">
                                <label for="date"><b>Bill Date:</b></label>
                                <label for="date">{{ \Carbon\Carbon::parse($bills->bill_date)->format('d/m/Y')}}</label>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="area"><b>Area:</b></label>
                                    <label for="area">{{  $bills->area }}</label>
                                </div>

                                <div class="form-group col-md-4">
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="state"><b>State:</b></label>
                                    <label for="state"> {{  $bills->state }}</label>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="city"><b>City:</b></label>
                                    <label for="city"> {{  $bills->city }}</label>
                                </div>

                                <div class="form-group col-md-4">
                               
                                </div>

                                <div class="form-group col-md-4">
                                <label for="house_no"><b>House No:</b></label>
                                <label for="house_no">{{ $bills->house_no }}</label> 
                                </div>

                                <div class="form-group col-md-4">
                                <label for="landmark"><b>Land Mark:</b></label>
                                <label for="landmark">{{ $bills->landmark }}</label> 
                                </div>

                            
                                <div class="form-group col-md-4">
                               
                                </div>


                                <div class="form-group col-md-4">
                                <label for="address_type"><b>Address Type:</b></label>
                                <label for="address_type">{{ $bills->address_type }}</label> 
                                </div>
                        
                                <div class="form-group col-md-4">
                                <label for="pincode"><b>Pincode:</b></label>
                                <label for="pincode">{{ $bills->pincode }}</label> 
                                </div>

                                <div class="form-group col-md-4">
                                   
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="discount"><b>Discount:</b></label>
                                    <label for="discount">{{  $bills->discount }}</label>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="sub_total"><b>Sub Total:</b></label>
                                    <label for="sub_total">{{  $bills->sub_total }}</label>
                                </div>
                                <div class="form-group col-md-4">
                               
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="total_amount"><b>Total Amount:</b></label>
                                    <label for="total_amount">{{  $bills->total_amount }}</label>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="coupon_code"><b>Coupon Code:</b></label>
                                    <label for="coupon_code">{{  $bills->coupon_code }}</label>
                                </div>

                                <div class="form-group col-md-4">
                               
                               </div>

                                <div class="form-group col-md-4">
                                <label for="notes"><b>Notes:</b></label>
                                <label for="notes">{{  $bills->notes }}</label>

                               
                               <div class="form-group col-md-4">
                               
                               </div>

                            </div>
                            </div>

                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('bill') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <hr>

<h5>Bill Products</h5>
<div class="ibox-content">
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> Add</i></button> -->
          <hr>
                    <table class="table table-striped" id="myTable1">
                        <thead>
                            <th>
                                Product Name
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Categorie
                            </th>
                            <th>
                                MRP
                            </th>
                            <th>
                                Sub Total
                            </th>
                            <!-- <th>
                                Action
                            </th> -->
                        </thead>
                        <tbody>
                        @foreach ($billproducts as $billproduct)
                                <tr>
                                    <td>
                                        {{ $billproduct->product_name }}
                                    </td>
                                    <td>
                                        {{ $billproduct->quantity }}
                                    </td>
                                    <td>
                                        {{ $billproduct->categories['cat_name'] }}
                                    </td>
                                    <td>
                                        {{ $billproduct->mrp }}
                                    </td>
                                    <td>
                                        {{ $billproduct->sub_total }}
                                    </td>
                                    <!-- <td>
                                        <a href="{{ url('billproduct-edit/' . $billproduct->id) }}" id='btn1'
                                            data-placement="top"  data-original-title="Edit"
                                            class="btn-sm btn btn-warning"><i class="fa fa-edit"></i> Edit </a>
                                    </td> -->
                                </tr>
                            @endforeach    
                                                                    
                        </tbody>
                    </table>
                </div>
@endsection

@section('scripts')
<!-- dropdown.blade.php -->
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('select[name="category_id"]').on('change', function() {
        var category_id = jQuery(this).val();
        if (category_id) {
            jQuery.ajax({
                url: 'getsubcat/' + category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var listItems = "";
                    jQuery('select[name="subcategoryid"]').empty();
                    jQuery.each(data, function(key, value) {
                        listItems += "<option value='" + key +
                            "'>" + value + "</option>";
                    });
                    $("#subcategoryid").html(listItems);
                }
            });
        }
    });
});
</script>

<script>
        $(document).ready(function() {

            select = document.getElementById('status'); // or in jQuery use: select = this;
            if (select.value != "Delivered") {
//
            }else{
                $('td:nth-child(6),th:nth-child(6)').hide();
            }

            $('#myTable1').on('click', '.deletebtn', function() {

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
$("#customername").select2();

    </script>


@endsection
  