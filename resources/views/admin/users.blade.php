<?php
use Carbon\Carbon;
?>
@extends('layouts.master')

@section('title')
User 
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ action('UserController@insert') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                              
                                    <div class="form-group col-md-4">
                                    <label for="photo" class="col-form-label">Photo:</label>
                                    <input type="file" accept=".jpeg,.jpg,.png,.gif" name="photo">
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label for="name" class="col-form-label">Name:</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="phone" class="col-form-label">Phone:</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                            <label>User Type</label>
                                            <select name="usertype" class="form-control">
                                            <option value="">Select User Type</option>
                                            <option value="customer">Customer</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="email" class="col-form-label">Email:</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>


                                    <div class="form-group col-md-4">
                                    <label for="business_name" class="col-form-label">Business Name:</label>
                                    <input type="text" name="business_name"  class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label  class="col-form-label">Package Type</label>
                                    <select name="pack_type" class="form-control">
                                        <option value="">Select Package Type</option>
                                       @foreach ($subscriptions as $subscription)
                                            <option value="{{$subscription['subscription_id']}}">{{$subscription['subscription_name']}}</option>
                                            @endforeach
                                    </select>
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="pack_start" class="col-form-label">Package Start:</label>
                                    <input type="date" name="pack_start"  class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="pack_end" class="col-form-label">Package End:</label>
                                    <input type="date" name="pack_end"  class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Category:</label>
                                     <select class="form-control" name="category" id="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                                            @endforeach
                                    </select>
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="phone1" class="col-form-label">Phone 1:</label>
                                    <input type="text" name="phone1"  class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="phone2" class="col-form-label">Phone 2:</label>
                                    <input type="text" name="phone2"  class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="address" class="col-form-label">Address:</label>
                                    <input type="text" name="address"  class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="city" class="col-form-label">City:</label>
                                    <input type="text" name="city"  class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="downloads" class="col-form-label">Downloads:</label>
                                    <input type="text" name="downloads"  class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="todays_downloads" class="col-form-label">Todays Downloads:</label>
                                    <input type="text" name="todays_downloads"  class="form-control">
                                    </div>

                                        <div class="form-group col-md-4">
                                    <label for="unlimited" class="col-form-label">Unlimited:</label>
                                      <select name="unlimited" class="form-control">
                                        <option value="">Select Unlimited</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>

                                    </div>

                                        <div class="form-group col-md-4">
                    
                                        <label class="checkbox-inline i-checks" style="margin-top:35px;">
      <div class="icheckbox_square-green form-group" >
    <input type="checkbox" class="form-control" value="1" name="free_trial_checked" style="position: absolute; opacity: 0;">
<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
</div> Free Trial</label>
                                    </div>


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
<!-- end  Modal -->

<!-- delete Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "User"; @endphp</h5>
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

<!-- end delete Modal -->
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <h4 class="card-title">@yield('title')
                <button type="button" class="pull-right btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    + ADD @yield('title')
                </button>
            </h4>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable1">
                    <thead>
                      <th>
                        Name
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                       Business Name
                      </th>
                      <th>
                       Category 
                      </th>
                      <th>
                       Package Type 
                      </th>
                      <th>
                       Package Start 
                      </th>
                      <th>
                       Package End 
                      </th>
                      <th>
                        Registered Date
                      </th>
                      <th>
                       Status
                      </th>
                      <th>
                       Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                      <tr>
                        <td>
                          {{ $row->name }}
                        </td>
                        <td>
                        {{ $row->phone }}
                        </td>
                        <td>
                        {{ $row->business_name }}
                        </td>
                        <td>
                        {{ $row->category['cat_name'] }}
                        </td>
                        <td> @if(!empty($row->subscription['subscription_name']))
                       {{ $row->subscription['subscription_name'] }}
                        @else
No Package
                        @endif
                        </td>
                      <td data-sort="<?php echo strtotime($row->package_start); ?>">

@if(!empty($row->package_start))
                        {{ date('d F Y', strtotime($row->package_start)) }}
                        @else

                        @endif

                        </td>
                        <td data-sort="<?php echo strtotime($row->package_end); ?>">
                        {{ date('d F Y', strtotime($row->package_end)) }}
                        </td>

                       <td data-sort="<?php echo strtotime($row->created_at); ?>">
                        {{ date('d F Y', strtotime($row->created_at)) }}
                        </td>

                       <td>
                       @if(!empty($row->package_end) && $row->package_end > Carbon::today())
                      <span class="label label-primary" style="background-color: #4caf50 !important;">Active</span> 
                        @elseif(!empty($row->package_end) && $row->package_end < Carbon::today())
                    <span class="label label-danger">In-Active</span> 
                    @else
               <span class="label label-info">Free</span>          @endif
                
                        </td>

                        <td data-url="{{ url('users-delete/' .$row->id) }}">
                                        <a href="{{ url('users-edit/'.$row->id) }}"
                                        class="btn-sm btn btn-warning"
                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i>  </a>

                                        <a href="javascript:void(0)"
                                        class="btn-sm btn btn-danger deletebtn"
                                        data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-danger" title="Delete"><i
                                        class="fa fa-trash"></i> </a>
                      
                      </tr>
                      @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {

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

$(document).ready(function() {
    $('#myTable1').DataTable( {
        "order": [[ 7, "desc" ]]
    } );
} );
</script>



@endsection