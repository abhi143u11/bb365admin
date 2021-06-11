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
                            <div class="col-md-12">

                                <form action="{{ url('users-update/' . $users->id) }}" method="POST"  enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $users->id }}">

<div class="row">
                                    <div class="form-group col-md-4">
                                  <img src="{{ URL::to('/') }}/images/logo/{{ $users->photo }}" class="img-thumbnail" width='80' />
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label for="photo" class="col-form-label">Photo:</label>
                                    <input type="file" name="photo" value="{{ $users->photo }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label for="name" class="col-form-label">Name:</label>
                                    <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label for="phone" class="col-form-label">Phone:</label>
                                    <input type="text" name="phone" value="{{ $users->phone }}" class="form-control">
                                    </div>


                                    <div class="form-group col-md-4">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="email" name="email" value="{{ $users->email }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label for="business_name" class="col-form-label">Business Name:</label>
                                    <input type="text" name="business_name" value="{{ $users->business_name }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label  class="col-form-label">Package Type</label>
                                    <select name="pack_type" class="form-control">
                                        <option value="">Select Package Type</option>
                                        <option value="0">No Package</option>
                                       @foreach ($subscriptions as $subscription)
                                            <option value="{{$subscription['subscription_id']}}"
                                                {{ $subscription['subscription_id'] == $users->package_type ? 'selected="selected"' : '' }}>
                                                {{$subscription['subscription_name']}}</option>
                                            @endforeach
                                    </select>
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="pack_start" class="col-form-label">Package Start:</label>
                                    <input type="date" name="pack_start" value="{{ $users->package_start }}" class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="pack_end" class="col-form-label">Package End:</label>
                                    <input type="date" name="pack_end" value="{{ $users->package_end }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Category:</label>
                                     <select class="form-control" name="category" id="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category['id']}}"
                                                {{ $category['id'] == $users->category_id ? 'selected="selected"' : '' }}>
                                                {{$category['cat_name']}}</option>
                                            @endforeach
                                    </select>
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="phone1" class="col-form-label">Phone 1:</label>
                                    <input type="text" name="phone1" value="{{ $users->phone1 }}" class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="phone2" class="col-form-label">Phone 2:</label>
                                    <input type="text" name="phone2" value="{{ $users->phone2 }}" class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="address" class="col-form-label">Address:</label>
                                    <input type="text" name="address" value="{{ $users->address }}" class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="city" class="col-form-label">City:</label>
                                    <input type="text" name="city" value="{{ $users->city }}" class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="downloads" class="col-form-label">Downloads:</label>
                                    <input type="text" name="downloads" value="{{ $users->downloads }}" class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="todays_downloads" class="col-form-label">Todays Downloads:</label>
                                    <input type="text" name="todays_downloads" value="{{ $users->todays_downloads }}" class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="unlimited" class="col-form-label">Unlimited:</label>
                                      <select name="unlimited" class="form-control">
                                        <option value="">Select Unlimited</option>
                                        <option value="1" {{ ($users->unlimited == 1)? "selected" : "" }}>Yes</option>
                                        <option value="0" {{ ($users->unlimited == 0)? "selected" : "" }}>No</option>
                                    </select>
                                    </div>

                                    <!-- <div class="form-group">
                                    <label for="password" class="col-form-label">Password:</label>
                                    <input type="password" name="password"  class="form-control">
                                </div> -->

                                </div>
                                
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('users') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>

                    </div>

                    

                </div>
            </div>

        </div>

    <hr>
<h4>Transaction</h4>
<div class="ibox-content">
    <table class="table dataTables-garment_table" class="garment_table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Amount</th>
                </tr>
        </thead>
        <tbody>
           @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->transaction_id }}</td>
               <td>{{ date("d-m-Y", strtotime($transaction->created_at)) }}</td>
             
                <td>{{ $transaction->amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.dataTables-garment_table').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: 'copy'
            },
            {
                extend: 'csv'
            },
            {
                extend: 'excel'
            },
            {
                extend: 'pdf'
            },
            {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    });
    });

    </script>
@endsection
