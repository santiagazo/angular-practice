@extends('layouts.user.main')

@section('title')

@endsection

@section('css')
  <link rel="stylesheet" href="{{ url('assets/plugins/dropzone-4.3.0/dist/dropzone.css') }}">

  <style>
      .container-fluid{
        min-height: 500px;
      }
  </style>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div id="fileDropzone" class=dropzone></div>
      <img src="#" id='signatureImage' alt="">
    </div>
  </div>
</div>



@endsection

@section('js')
  <script type="text/javascript" src="{{ url('assets/plugins/dropzone-4.3.0/dist/dropzone.js') }}"></script>
  <script>

    $(function(){
      Dropzone.autoDiscover = false;

      $("div#fileDropzone").dropzone({
        url: "{{ url('sandbox/store') }}",
        method: "POST",
        uploadMultiple: false,
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        maxFiles: 1,
        init: function() {
              this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
              });
        },
        addRemoveLinks: true,
        success: function (file, response) {
                // swal(response);
                console.log(response);
                console.log(file);
                getSignatureForms(response);
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            }
      });

    });

      function getSignatureForms(hash){
        $.ajax({
          url: "{{ url('/sandbox/signatureforms') }}",
          type: 'GET',
          data: {
            hash: hash
          },
          success: function (response) {
            console.log(response);
            var response = jQuery.parseJSON(response);
            if (typeof response == "string") {
              swal(response);
            } else if (typeof response == "object") {
              var url = response.document;
              $.ajax({
                  url : url,
                  cache: true,
                  processData : false,
              }).always(function(){
                  $("#signatureImage").attr("src", url).fadeIn();
              });
            }

          },
          error: function (xhr) {
            console.log(xhr);
          }
        });
      }

  </script>

@stop
