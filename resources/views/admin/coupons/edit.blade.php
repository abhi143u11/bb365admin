@extends('layouts.master')

@section('title')
    Edit Coupons 
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

                            <form action="{{ url('coupons-update/'.$coupons->id) }}" method="POST"
                                enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" class="" name="id" id="id" value="{{ $coupons->id }}">


                                <div class="form-group">
                                    <label for="coupon_code"><b>Coupon Code:</b></label>
                                    <input type="text" name="coupon_code" class="form-control" id="" value="{{ $coupons->coupon_code }}">
                                </div>

                            <div class="form-group">
                                    <label for="coupon_type"><b>Coupon Type:</b></label>
                                    <select class="form-control" name="coupon_type" id="coupon_type">
                                    <option value="">Select Coupon Type</option>
                                    <option value="percentage" {{ $coupons->coupon_type == 'percentage' ? 'selected="selected"' : '' }}>Percentage</option>
                                    <option value="amount"     {{ $coupons->coupon_type == 'amount' ? 'selected="selected"' : '' }}>Amount</option>
                                    </select>
                                </div> 
                    
                        
                                <div class="form-group">
                                    <label for="max_discount"><b>Max Discount:</b></label>
                                    <input type="text" name="max_discount" class="form-control" id="" value="{{ $coupons->max_discount }}">
                                </div>

                                         <!-- <div class="form-group">
                                    <label for="minimum_price"><b>Minimum Cart Amount:</b></label>
                                    <input type="text" name="minimum_price" class="form-control" id="" value="{{ $coupons->minimum_price }}">
                                </div> -->

                                    <div class="form-group">
                                    <label for="name" class="col-form-label"><b>Customer:</b></label>
                                    <select class="form-control" name="customer_id" id="customer">
                                    <option value="0"
                                    {{ $coupons->customer_id == 'all' ? 'selected="selected"' : '' }}>All</option>

                                            @foreach ($customers as $customer)
                                            <option value="{{$customer['id']}}"
                                                {{ $customer['id'] == $coupons->customer_id ? 'selected="selected"' : '' }}>
                                                {{$customer['name']}}-{{ $customer['phone']}}</option>
                                            @endforeach
                                       </select>
                                    </div>

                               
                             <div class="form-group">
                                <label for="status"><b>Coupon Status:</b></label>
                                <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option value="0"
                                {{ $coupons->coupon_status  == "0" ? 'selected="selected"' : '' }}>In-Active
                                </option>
                                <option value="1"
                                {{ $coupons->coupon_status  == "1" ? 'selected="selected"' : '' }}>Active
                                </option>
                                </select>
                            </div>

                        
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('coupons') }}" class="btn btn-danger">Cancel</a>

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
$("#customer").select2();
$("#categoryid").select2();
$("#customername").select2();
    </script>

@endsection
