@extends('layouts.master')

@section('title')
    Edit Images 
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
                            <div class="col-md-12">

                                <form action="{{ url('images-update/'.$images->image_id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $images->image_id }}">

                                    <div class="row">

                                    <div class="form-group col-md-6">
                                        <img src="{{ URL::to('/') }}/images/images/{{ $images->image }}" class="img-thumbnail" width="80">
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label for="image" class="col-form-label">Choose Image :</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                    <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Product Name:</label>
                                    <input type="text" name="name" value="{{ $images->product_name }}" class="form-control" id="productname">
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label for="order no">Order Number:</label>
                                    <input type="text" name="order_no" class="form-control" id="order_no" value="{{ $images->order_number }}">
                                </div>

                                    <div class="form-group col-md-6">
                                    <label for="mrp">MRP:</label>
                                    <input type="text" name="mrp" class="form-control" id="" value="{{ $images->mrp }}">
                                   </div>

                                   <div class="form-group col-md-6">
                                    <label for="original_price">Original Price:</label>
                                    <input type="text" name="original_price" class="form-control" id="original_price" value="{{ $images->original_price }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="size">Size:</label>
                                    <input type="text" name="size" class="form-control" id="" value="{{ $images->size }}">
                                </div>
                                            
                                <div class="form-group col-md-6">
                                    <label for="min_qty">Min Quantity:</label>
                                    <input type="text" name="min_qty" class="form-control" id="" value="{{ $images->min_qty }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="max_qty">Max Quantity:</label>
                                    <input type="text" name="max_qty" class="form-control" id="" value="{{ $images->max_qty }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="qty">Quantity:</label>
                                    <input type="text" name="qty" class="form-control" id="" value="{{ $images->quantity }}">
                                </div>

                                <div class="form-group col-md-6">
                                <label for="description">description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $images->description }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sub_title">Sub Title:</label>
                                <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{ $images->sub_title }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gross_wt">Gross Weight:</label>
                                <input type="text" name="gross_wt" class="form-control" id="gross_wt" value="{{ $images->gross_wt }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="net_wt">Net Weight:</label>
                                <input type="text" name="net_wt" class="form-control" id="net_wt" value="{{ $images->net_wt }}">
                            </div>

                                <div class="form-group col-md-6">
                            <label for="subcategory_id">Featured:</label>
                                <select class="form-control" name="featured" id="featured">
                                    <option value="">Select Featured</option>                               
                                    <option value="1"  {{ $images->featured  == "1" ? 'selected="selected"' : '' }}>Yes </option>  
                                    <option value="0"  {{ $images->featured  == "0" ? 'selected="selected"' : '' }}>No </option>  
                                </select>
                            </div>

                                    <div class="form-group col-md-6">
                                    <label for="categorie" class="col-form-label">Product Categorie:</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select Categorie</option>
                                            @foreach ($categories as $value)
                                            <option value="{{$value['id']}}"
                                                {{ $value['id'] == $images->product_cat_id ? 'selected="selected"' : '' }}>
                                                {{$value['cat_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label for="available">Available:</label>
                                    <select class="form-control" name="available" id="available">
                                        <option value="">Select Available</option>                               
                                        <option value="1"
                                         {{ $images->available  == "1" ? 'selected="selected"' : '' }}>Available</option>    
                                        <option value="0" 
                                        {{ $images->available  == "0" ? 'selected="selected"' : '' }}>Not-Available</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="limited_stock">Limited Stock:</label>
                                    <select class="form-control" name="limited_stock" id="limited_stock">
                                        <option value="">Select Limited Stock</option>                               
                                        <option value="1" 
                                        {{ $images->limited_stock  == "1" ? 'selected="selected"' : '' }}>YES</option>    
                                        <option value="0" 
                                        {{ $images->limited_stock  == "0" ? 'selected="selected"' : '' }}>NO</option>
                                    </select>
                                </div>

                                         <div class="form-group col-md-6">
                                        <label for="hsn_code">HSN Code:</label>
                                        <input type="text" name="hsn_code" class="form-control" value="{{ $images->hsn_code }}" id="hsn_code">
                                    </div>

                                  </div>
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('images') }}" class="btn btn-danger">Cancel</a>

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
