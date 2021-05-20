@extends('layouts.master')

@section('title')
    Edit Bill Products 
@endsection

@section('content')


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <form action="{{ url('billproduct-update/'.$billproducts->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $billproducts->id }}">

                                <div class="form-group">
                                    <label for="product_name" class="col-form-label"><b>Products:</b></label>
                                    <select class="form-control" name="product_name" id="productname">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                        <option value="{{$product['product_id']}} | {{$product['product_name']}}"
                                            {{ $product['product_id'] == $billproducts->product_id ? 'selected="selected"' : '' }}>
                                            {{$product['product_name']}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="mrp"><b>MRP:</b></label>
                                    <input type="text" name="mrp" class="form-control" id="" value="{{ $billproducts->mrp }}">
                                </div>

                                <div class="form-group">
                                    <label for="mmd_price"><b>MMD Price:</b></label>
                                    <input type="text" name="mmd_price" class="form-control" id="" value="{{ $billproducts->mmd_price }}">
                                </div>

                                <div class="form-group">
                                    <label for="size"><b>Size:</b></label>
                                    <input type="text" name="size" class="form-control" id="" value="{{ $billproducts->size }}">
                                </div>

                                    <div class="form-group">
                                    <label for="categorie" class="col-form-label"><b>Categorie:</b></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Select Categorie</option>
                                        @foreach ($categories as $value)
                                        <option value="{{$value['id']}}"
                                            {{ $value['id'] == $billproducts->product_cat_id ? 'selected="selected"' : '' }}>
                                            {{$value['cat_name']}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="quantity" class="col-form-label"><b>Quantity:</b></label>
                                    <input type="text" name="quantity" value="{{ $billproducts->quantity }}" class="form-control">
                                    </div>
                                
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('bill-edit/' . $billproducts->bill_id) }}" class="btn btn-danger">Cancel</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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



@endsection
