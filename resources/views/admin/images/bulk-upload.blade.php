
@extends('layouts.master')
@section('title')
Categories 

@endsection

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
 
   
</head>
<body>

<div class="container">
        <?php $id = $_GET['id']; ?>
    <h3 class="jumbotron">Drag and Drop Files here to upload</h3>
    <form method="post" action="{{ url('/bulkinsert/') }}/<?php echo $id ?>" enctype="multipart/form-data"  class="dropzone" id="dropzone">
            
    @csrf
</form>  
  <div>    

@endsection

@section('scripts')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>


@endsection