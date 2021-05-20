@extends('layouts.master')

@section('title')
    Edit Recipes
@endsection

@section('content')
  <!-- Modal -->
  <div class="modal fade" id="ingredients" tabindex="-1" role="dialog" aria-labelledby=""
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Ingredients</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('RecipesIngredientsController@store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="rec_id" value="{{ $recipes->recipe_id }}">

                        <div class="form-group">
                            <label for="item">Item:</label>
                            <input type="text" name="item" class="form-control" id="item">
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="text" name="weight" class="form-control" id="weight">
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
    <!-- end ----Modal -->
    
<!-- delete Modal for Customer Address -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby=""
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
                    <h5>Are You Sure Want To Delete This Address?</h5>
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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{ url('recipes-update/' . $recipes->recipe_id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $recipes->recipe_id }}">
                                    <div class="row">
                                    <div class="form-group col-md-6">
                                        <img src="{{ URL::to('/') }}/images/{{ $recipes->photo }}" class="img-thumbnail" width="70">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="file" name="photo" class="custom-file-input" id="photo">
                                        <label class="custom-file-label" for="photo"><b>Choose Photo</b></label>
                                    </div>

                                    <div class="form-group col-md-6">
                                            <label for="product"><b>Products:</b></label>
                                            <select class="form-control" name="product" id="product" style="width:100%;">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                            <option value="{{$product['product_id']}}"
                                                {{ $product['product_id'] == $recipes->product_id ? 'selected="selected"' : '' }}>
                                                {{$product['product_name']}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                        <label for="name"><b>Name:</b></label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $recipes->name }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="description"><b>description:</b></label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ $recipes->description }}</textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="method"><b>Preparation Method:</b></label>
                                        <textarea class="form-control" id="method" name="method" rows="3">{{ $recipes->preparation_method }}</textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="how_to_cook"><b>How To Cook:</b></label>
                                        <input type="text" name="how_to_cook" class="form-control" id="how_to_cook" value="{{ $recipes->how_to_cook }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="sub_title"><b>Sub Title:</b></label>
                                        <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{ $recipes->sub_title }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="cook_time"><b>Cooking Time:</b></label>
                                        <input type="text" name="cook_time" class="form-control" id="cook_time" value="{{ $recipes->cook_time }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="serves"><b>Serves:</b></label>
                                        <input type="text" name="serves" class="form-control" id="serves" value="{{ $recipes->serves }}">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('recipes') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <hr>
<h5>Recipe Ingredients</h5>

  <div class="ibox-content">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ingredients"><i class="fa fa-plus"> Add</i></button>
          <hr>
          <table class="table" id="myTable">
                    <thead>
                        <th>
                           Id
                        </th>
                        <th>
                            Item
                        </th>
                        <th>
                            Weight
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                    @foreach ($ingredients as $ingredient)
                                <tr>
                                    <td>
                                        {{ $ingredient->recipe_ing_id }}
                                    </td>
                                    <td>
                                        {{ $ingredient->item }}
                                    </td>
                                    <td>
                                        {{ $ingredient->weight }}
                                    </td>
                                 
                                    <td data-url="{{ url('ingredients-delete/' .$ingredient->recipe_ing_id) }}">
                                        <a href="{{ url('ingredients-edit/'.$ingredient->recipe_ing_id) }}" 
                                        class="btn-sm btn btn-warning"
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

$("#product").select2();
});

 
    </script>
@endsection
