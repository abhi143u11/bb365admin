@extends('layouts.master')

@section('title')
User 
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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

         

          <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control">
          </div>

          <div class="form-group">
            <label for="phone" class="col-form-label">Phone:</label>
            <input type="text" name="phone" class="form-control">
          </div>

          <div class="form-group">
                <label>User Type</label>
                 <select name="usertype" class="form-control">
                <option value="">Select User Type</option>
                <option value="customer">Customer</option>
              <option value="admin">Admin</option>
          </select>
          </div>

          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" name="password" class="form-control">
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