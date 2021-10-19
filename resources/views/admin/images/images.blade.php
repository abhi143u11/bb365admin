@extends('layouts.master')

@section('title')
Images

@endsection

@section('content')
<meta name="_token" content="{{csrf_token()}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<style>
    .modal {
        z-index: 100000 !important;
    }

    .select2-container--open {
        z-index: 9999999 !important;
        width: 100% !important;
    }

    .select2-container {
        width: 100% !important;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="image">Choose Image :</label>
                            <input type="file" name="image" accept=".jpeg,.png,.gif,.jpg" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="subcategory_id">Image Type:</label>
                            <select class="form-control" name="image_type" id="image_type">
                                <option value="0">Free</option>
                                <option value="1" selected="selected">Paid</option>
                            </select>
                        </div>

                        <div id="video" class="form-group col-md-6">
                            <label for="video">Select Video:</label>
                            <input type="file" name="video" accept=".mp4" class="form-control">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="post_type">Post Type:</label>
                            <select class="form-control" name="post_type" id="post_type">
                                <option value="1">Post</option>
                                <!-- <option value="2">Story</option> -->
                                <option value="3">Video</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category_id">Category:</label>
                            <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                <option value="">Select Category</option>
                                @foreach ($subcategories as $value)
                                <option value="{{ $value->sub_cat_id  }}">{{ $value->sub_cat_name }}</option>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="subcategory_id">Image Type:</label>
                        <select class="form-control" name="image_type" id="image_type1">
                            <option value="0">Free</option>
                            <option value="1" selected="selected">Paid</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="post_type">Post Type:</label>
                        <select class="form-control" name="post_type" id="post_type1">
                            <option value="1">Post</option>
                            <option value="2">Story</option>
                            <option value="3">Video</option>
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="category_id">Category:</label>
                        <select class="form-control" name="sub_cat_id" id="sub_cat_id1">
                            <option value="">Select Category</option>
                            @foreach ($subcategories as $value)
                            <option value="{{ $value->sub_cat_id  }}">{{ $value->sub_cat_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Submit" id="bulk" name="submit">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end  Modal -->

<!-- delete Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" style="margin-right: 130px !important;" class="pull-right btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    + ADD @yield('title')
                </button>

                <button type="button" class="pull-right btn btn-info" data-toggle="modal" data-target="#exampleModal1">
                    + ADD Bulk
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
                            Image Type
                        </th>
                        <th>Post Type</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)

                        <tr>
                            <td>
                                <img src="{{ URL::to('/') }}/images/thumbnails/{{ $image->image }}" class="img-thumbnail" width='80' />
                            </td>

                            <td>
                                {{ $image->subcategories['sub_cat_name'] }}
                            </td>
                            <td>
                                <?php if ($image->post_type == 2) {
                                    echo 'Story';
                                } else if ($image->post_type == 3) {
                                    echo 'Video';
                                } else {
                                    echo 'Post';
                                } ?>
                            </td>
                            <td>
                                <?php if ($image->image_type == 1) {
                                    echo 'Paid';
                                } else {
                                    echo 'Free';
                                } ?>
                            </td>

                            <td data-url="{{ url('imagesnew-delete/' . $image->image_id ) }}">


                                <a href="javascript:void(0)" class="btn-sm btn btn-danger deletebtn" data-toggle="tooltip" data-placement="top" class="btn-md btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
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
<script type="text/javascript">
    $('#bulk').on('click', function(event) {
        // event.preventDefault();
        //

        let image_type = $('#image_type1').val();
        let post_type = $('#post_type1').val();
        let sub_cat_id = $('#sub_cat_id1').val();
        // alert(sub_cat_id);
        window.open("bulk/?id=" + image_type + "/" + post_type + "/" + sub_cat_id, "_self");
        // alert(sub_cat_id);
    });


    $(function() {
        $("select[name=post_type]").click(function() {
            if ($(this).val() == "3") {

                $('#video').show();

            } else {
                $('#video').hide();
            }

        });
    });


    $(document).ready(function() {
        $('#video').hide();
    });
</script>

@endsection