@extends('layouts.master')

@section('title')
PSD File

@endsection

@section('content')

<style>
.modal {
    z-index: 100000 !important;
}

.select2-container--open {
    z-index: 9999999 !important;
        width: 100% !important;
}

.select2-container{
        width: 100% !important;
}
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New PSD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ action('CustomImgController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
            
                        <div class="form-group">
                        <label for="image" >Choose Image:</label>
                        <input type="file" name="image" accept=".jpg,.jpeg,.png,.gif" class="form-control">
                    </div>
            
                        <div class="form-group">
                        <label for="image" >Choose PSD File:</label>
                        <input type="file" name="file" accept=".psd" class="form-control">
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
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
                    + ADD File
                </button>
            </h4>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                       <th>
                           Image
                        </th>
                      <th>
                      File Name
                      </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>   
                 @foreach ($custom_imgs as $image)
                        <tr>
                              <td>
                                <img src="{{ URL::to('/') }}/customimg2/{{ $image->image }}" class="img-thumbnail" width='80' />
                            </td>
                              <td>
                                {{ $image->psd }}
                            </td>

                            <td data-url="{{ url('customimg-delete/' . $image->image_id ) }}">
                                <a href="javascript:void(0)" 
                                class="btn-sm btn btn-danger deletebtn"
                                data-toggle="tooltip" data-placement="top" class="btn-md btn btn-danger" title="Delete"><i
                                        class="fa fa-trash"></i>  </a>
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