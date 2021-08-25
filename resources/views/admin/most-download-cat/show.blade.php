@extends('layouts.master')

@section('title')
Most Downloads Catgeories 
@endsection

@section('content')

<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <h4 class="card-title">@yield('title')
            </h4>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped" id="example">
                    <thead>
                        <th>
                          Category
                        </th>
                        <th>
                           Count
                        </th>
                    </thead>
                    <tbody>
                <?php $i=1; ?>
                    @foreach ($most_download_cate as $catgeory)
                        <tr>
                            <td>
                                {{ $catgeory->category['sub_cat_name'] }}
                            </td>
                            <td>
                                {{ $catgeory->catgeory_count }}
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
<!-- <script>
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );

</script> -->



@endsection