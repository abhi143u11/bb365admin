@extends('layouts.master')

@section('title')
Bulk Edit Products
@endsection

@section('content')
<style>
.table>thead>tr>th,
.table>tbody>tr>th,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>tbody>tr>td,
.table>tfoot>tr>td {
    border-top: 1px solid #e7eaec;
    padding: 2px;
    vertical-align: middle;
}

</style>
<form action="{{ action('ProductsController@create') }}" id="form1" method="POST">
    {{ csrf_field() }}
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-title">
                <h4 class="card-title">@yield('title')
                    <button type="submit" class="pull-right btn btn-primary"
                        style="background-color: #363f50;color:black;"><i class="fa fa-pencil-square"></i>
                        Update
                    </button>
                </h4>

            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table" id="">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Size
                            </th>
                            <th>
                                MRP
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Original Price
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td width="15%">
                                    {{ $product->product_name }}
                                </td>
                                <td width="15%">
                                    {{ $product->size }}
                                </td>
                                <td width="25%">
                                    <input type="text" name="mrp[]" class="form-control col-md-4" id=""
                                        value="{{ $product->mrp }}">
                                    <input type="hidden" name="ids[]" class="form-control" id=""
                                        value="{{ $product->product_id }}">
                                </td>
                                <td width="25%">
                                    <input type="text" name="qty[]" class="form-control col-md-4" id=""
                                        value="{{ $product->quantity }}">
                                </td>
                                <td width="20%">
                                    <input type="text" name="orginal[]" class="form-control col-md-6" id=""
                                        value="{{ $product->original_price }}">
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</form>
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
