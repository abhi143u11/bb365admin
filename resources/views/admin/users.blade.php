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
                <table class="table table-striped" id="myTable">
                    <thead>
                    <th>
                        Id
                      </th>
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
                        Usertype
                      </th>
                      <th>
                       Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                      <tr>
                      <td>
                          {{ $row->id }}
                        </td>
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
                        {{ $row->usertype }}
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

    $('#myTable').on('click', '.deletebtn', function() {

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
    $('#myTable').DataTable();
});
</script>



@endsection