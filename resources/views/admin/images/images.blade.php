@extends('layouts.master')

@section('title')
Images

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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ action('ImagesController@insert') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                 <div class="row">
                        <div class="form-group col-md-6">
                        <label for="image" >Choose Image :</label>
                        <input type="file" name="image" class="form-control">
                    </div>
  <div class="form-group col-md-6">
                            <label for="subcategory_id">Type:</label>
                            <select class="form-control" name="type" id="type">
                                                       
                                <option value="0">Free</option>    
                                <option value="1">Paid</option>
                            </select>
                        </div>
                  
                    <div class="form-group col-md-6">
                            <label for="subcategory_id">Featured:</label>
                            <select class="form-control" name="featured" id="featured">
                                                       
                                <option value="0">No</option>    
                                <option value="1">Yes</option>
                            </select>
                        </div>

                     
                        <div class="form-group col-md-6">
                            <label for="category_id">Category:</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $value)
                                <option value="{{ $value->id }}">{{ $value->cat_name }}</option>
                                @endforeach
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
                <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Product"; @endphp</h5>
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
                           Image
                        </th>
                    
                        <th>
                           Categorie
                        </th>
                         <th>
                           Type
                        </th>
                      <th>Featured</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                    @foreach ($images as $image)
                 
                        <tr>
                              <td>
                                <img src="{{ URL::to('/') }}/public/images/images/{{ $image->image }}" class="img-thumbnail" width='120' />
                            </td>
                         
                            <td>
                                {{ $image->categories['cat_name'] }}
                            </td>
                             <td>
                                <?php  if($image->type==0){ echo 'Free'; }else{ echo 'Paid'; } ?>
                            </td>
                          <td>
                                <?php  if($image->featured==0){ echo 'No'; }else{ echo 'Yes'; } ?>
                            </td>
                          
                            <td data-url="{{ url('images-delete/' . $image->image_id ) }}">
                                <a href="{{ url('images-edit/' . $image->image_id ) }}" class="btn-sm btn btn-warning"
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