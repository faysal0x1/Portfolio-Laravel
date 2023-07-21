@extends('admin.admin_master')

@section('admin')
 <script src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

 <div class="page-content">
  <div class="container-fluid">
   <div class="row">
    <div class="col-12">
     <div class="card">
      <div class="card-body">

       <h4 class="card-title">Portfolio Page </h4>

       <form method="post" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $portfolio->id }}">
        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio
          Name</label>
         <div class="col-sm-10">
          <input name="portfolio_name" class="form-control" type="text" id="example-text-input"
           value="{{ $portfolio->portfolio_name }}">
          @error('portfolio_name')
           <span class="text-danger">{{ $message }}</span>
          @enderror
         </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
         <div class="col-sm-10">
          <input name="title" class="form-control" type="text" id="example-text-input"
           value="{{ $portfolio->title }}">
          @error('title')
           <span class="text-danger">{{ $message }}</span>
          @enderror
         </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">
          Description</label>
         <div class="col-sm-10">
          <textarea name="description" id="elm1" cols="30" rows="10">
                                            {{ $portfolio->description }}
                                        </textarea>

          @error('description')
           <span class="text-danger">{{ $message }}</span>
          @enderror
         </div>
        </div>
        <!-- end row -->

        <div class=" row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
         <div class="col-sm-10">
          <input name="image" class="form-control" type="file" id="image">

         </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
         <div class="col-sm-10">

          <img id="showImage" class="rounded avatar-lg"
           src="{{ !empty($portfolio->image) ? url($portfolio->image) : url('upload/no_image.jpg') }}"
           alt="Card image cap">
         </div>
        </div>

        <!-- end row -->
        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio Data">
       </form>

      </div>
     </div>
    </div> <!-- end col -->

   </div>

  </div>
 </div>

 <script>
  $(document).ready(function() {
   $('#image').change(function(e) {
    var reader = new FileReader();
    reader.onload = function(e) {
     $('#showImage').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
   });
  });
 </script>
@endsection
