@extends('layouts.master')

@section('title')
    Edit Customers 
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

                                <form action="{{ url('address-update/'.$customers->customer_address_id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $customers->customer_id }}">

                                    <div class="form-group">
                            <label for="name"><b>Full Name:</b></label>
                            <input type="text" name="fullname" class="form-control" id="" value="{{$customers->full_name}}">
                                </div> 
                            <div class="form-group">
                                <label for="phone"><b>Mobile No:</b></label>
                                <input type="text" name="mobile" class="form-control" id="" value="{{$customers->mobile_no}}">
                            </div>
                            <div class="form-group">
                                <label for="pin"><b>Pincode:</b></label>
                                <input type="text" name="pincode" class="form-control" id="" value="{{$customers->pincode}}">
                            </div>
                            <div class="form-group">
                                <label for="number"><b>House No:</b></label>
                                <input type="text" name="houseno" class="form-control" id="" value="{{$customers->house_no}}">
                            </div>
                            <div class="form-group">
                                <label for="area"><b>Area:</b></label>
                                <input type="text" name="area" class="form-control" id="" value="{{$customers->area}}">
                            </div>
                            <div class="form-group">
                                <label for="landmark"><b>LandMark:</b></label>
                                <input type="text" name="landmark" class="form-control" id="" value="{{$customers->landmark}}">
                            </div>
                            <div class="form-group">
                                <label for="city"><b>City:</b></label>
                                <input type="text" name="city" class="form-control" id="" value="{{$customers->city}}">
                            </div>

                            <div class="form-group">
                            <label for="state"><b>Select State:</b></label>
                            <select class="form-control" name="state">
                            <option value="">Select State</option>
                            <option value="AP" 
                            {{ $customers->state  == "AP" ? 'selected="selected"' : '' }}>Andhra Pradesh
                            </option>
                            <option value="AR"
                            {{ $customers->state  == "AR" ? 'selected="selected"' : '' }}>Arunachal Pradesh
                            </option>
                            <option value="maharashtra"
                            {{ $customers->state  == "maharashtra" ? 'selected="selected"' : '' }}>maharashtra
                            </option>
                            <option value="MP"
                            {{ $customers->state  == "MP" ? 'selected="selected"' : '' }}>MP
                            </option>
                            <option value="Gujrat"
                            {{ $customers->state  == "Gujrat" ? 'selected="selected"' : '' }}>Gujrat
                            </option>
                            <option value="AS" 
                            {{ $customers->state  == "AS" ? 'selected="selected"' : '' }}>Assam</option>
                            <option value="BR" 
                            {{ $customers->state  == "BR" ? 'selected="selected"' : '' }}>Bihar</option>
                            <option value="CT" 
                            {{ $customers->state  == "CT" ? 'selected="selected"' : '' }}>Chhattisgarh</option>
                            <option value="GA" 
                            {{ $customers->state  == "GA" ? 'selected="selected"' : '' }}>Goa</option>
                            <option value="HR" 
                            {{ $customers->state  == "HR" ? 'selected="selected"' : '' }}>Haryana</option>
                            <option value="HP" 
                            {{ $customers->state  == "HP" ? 'selected="selected"' : '' }}>Himachal Pradesh</option>
                            <option value="JK" 
                            {{ $customers->state  == "JK" ? 'selected="selected"' : '' }}>Jammu and Kashmir</option>
                           <option value="JH" 
                           {{ $customers->state  == "JH" ? 'selected="selected"' : '' }}>Jharkhand</option>
                           <option value="KA" 
                           {{ $customers->state  == "KA" ? 'selected="selected"' : '' }}>Karnataka</option>
                           <option value="KL" 
                           {{ $customers->state  == "KL" ? 'selected="selected"' : '' }}>Kerala</option>
                           <option value="MP" 
                           {{ $customers->state  == "MP" ? 'selected="selected"' : '' }}>Madhya Pradesh</option>
                           <option value="MN" 
                           {{ $customers->state  == "MN" ? 'selected="selected"' : '' }}>Manipur</option>
                           <option value="ML"
                           {{ $customers->state  == "ML" ? 'selected="selected"' : '' }}>Meghalaya</option>
                           <option value="MZ"
                           {{ $customers->state  == "MZ" ? 'selected="selected"' : '' }}>Mizoram</option>
                           <option value="NL" 
                           {{ $customers->state  == "NL" ? 'selected="selected"' : '' }}>Nagaland</option>
                           <option value="OR"
                           {{ $customers->state  == "OR" ? 'selected="selected"' : '' }}>Orissa</option>
                           <option value="PB"
                           {{ $customers->state  == "PB" ? 'selected="selected"' : '' }}>Punjab</option>
                           <option value="RJ" 
                           {{ $customers->state  == "RJ" ? 'selected="selected"' : '' }}>Rajasthan</option>
                           <option value="SK"
                            {{ $customers->state  == "SK" ? 'selected="selected"' : '' }}>Sikkim</option>
                            <option value="TN" 
                            {{ $customers->state  == "TN" ? 'selected="selected"' : '' }}>Tamil Nadu</option>
                            <option value="TS"
                            {{ $customers->state  == "TS" ? 'selected="selected"' : '' }}>Telangana</option>
                            <option value="TR" 
                            {{ $customers->state  == "TR" ? 'selected="selected"' : '' }}>Tripura</option>
                            <option value="UK" 
                            {{ $customers->state  == "UK" ? 'selected="selected"' : '' }}>Uttarakhand</option>
                            <option value="UP" 
                            {{ $customers->state  == "UP" ? 'selected="selected"' : '' }}>Uttar Pradesh</option>
                            <option value="WB"
                            {{ $customers->state  == "WB" ? 'selected="selected"' : '' }}>West Bengal</option>
                            <option value="AN" 
                            {{ $customers->state  == "AN" ? 'selected="selected"' : '' }}>Andaman and Nicobar Islands</option>
                            <option value="CH" 
                            {{ $customers->state  == "CH" ? 'selected="selected"' : '' }}>Chandigarh</option>
                            <option value="DN" 
                            {{ $customers->state  == "DN" ? 'selected="selected"' : '' }}>Dadra and Nagar Haveli</option>
                            <option value="DD" 
                            {{ $customers->state  == "DD" ? 'selected="selected"' : '' }}>Daman and Diu</option>
                            <option value="DL" 
                            {{ $customers->state  == "DL" ? 'selected="selected"' : '' }}>Delhi</option>
                            <option value="LD" 
                            {{ $customers->state  == "LD" ? 'selected="selected"' : '' }}>Lakshadeep</option>
                            <option value="PY" 
                            {{ $customers->state  == "PY" ? 'selected="selected"' : '' }}>Pondicherry (Puducherry)</option>
                            </select>
                            </div>

                            <div class="form-group">
                            <label for="state"><b>Address Type:</b></label>
                            <select class="form-control" name="addresstype">
                            <option value="Home"
                                {{ $customers->address_type  == "Home" ? 'selected="selected"' : '' }}>Home
                                </option>
                              <option value="Office"
                               {{ $customers->address_type  == "Office" ? 'selected="selected"' : '' }}>Office
                               </option>
                            </select>
                            </div>
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('customers-edit/' . $customers->customer_id) }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
  

@endsection

@section('scripts')

@endsection
