@extends('layouts.master')

@section('title')
Customers Address's 

@endsection

@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <h4 class="card-title">Customers
            </h4>
        </div>
        <div class="ibox-content">
            <form action="{{ action('CustomerController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                  <div class="form-group col-md-6">
                            <label for="name"><b>Name:</b></label>
                            <input type="text" name="name" class="form-control text-capitalize" id="">
                        </div> 
                    <div class="form-group col-md-6">
                        <label for="phone"><b>Mobile No:</b></label>
                        <input type="text" name="phone" class="form-control" id="">
                    </div>
                    

              <div class="form-group col-md-6">
                  <a href="{{ url('customers') }}" class="btn btn-danger">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </div>
        </div>
        </form>
   
    </div>
</div>
<!-- delete Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Customers"; @endphp</h5>
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
            <h4 class="card-title">Customers
            </h4>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
            <table class="table table-striped" id="mytable">
                    <thead> 
                      <th>
                       Logo
                      </th>
                    <th>
                       Name
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                        Created At
                      </th>
                      <th >
                       Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach($customers as $row)
                      <tr>
                       <td>
                                <img src="{{ URL::to('/') }}/images/logo/{{ $row->photo }}" class="img-thumbnail" width='80' />
                            </td>
                      <td>
                          {{ $row->name }}
                        </td>
                        <td>
                          {{ $row->phone }}
                        </td>
                        <td data-sort='{{strtotime($row->created_at) }}'>
                          {{ date("d-m-Y", strtotime($row->created_at)) }}
                        </td>
                        <td data-url="{{ url('customers-delete/'.$row->id) }}">
                                        <a href="{{ url('customers-edit/'.$row->id) }}"class="btn-sm btn btn-warning"
                                data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>  </a>
                                
                                <a href="javascript:void(0)"
                                 class="btn-sm btn btn-danger deletebtn"
                                data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-danger" title="Delete"><i
                                        class="fa fa-trash"></i> </a>

                             
                                    </td>
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



</script>
@endsection        

           
 
