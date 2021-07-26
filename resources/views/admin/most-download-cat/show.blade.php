@extends('layouts.master')

@section('title')
Most Downloads Catgeories 
@endsection

@section('content')

<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <h4 class="card-title">@yield('title')
                <!-- <button type="button" class="pull-right btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    + ADD @yield('title')
                </button> -->
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
                          Category
                        </th>
                        <th>
                           Customer
                        </th>
                        <!-- <th>
                            Action
                        </th> -->
                    </thead>
                    <tbody>
   <?php $i=1; ?>
                    @foreach ($most_download_cate as $catgeory)
                        <tr>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                {{ $catgeory->category['cat_name'] }}
                            </td>
                            <td>
                                {{ $catgeory->customers['name'] }}
                            </td>

                        </tr>
                        <?php $i++ ?>
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


</script>



@endsection