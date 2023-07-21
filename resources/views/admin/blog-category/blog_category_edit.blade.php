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

       <form method="post" action="{{ route('update.blog.category') }}">
        @csrf

        <input type="hidden" name="id" value="{{ $blog->id }}">

        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category
          Name</label>
         <div class="col-sm-10">
          <input name="category" class="form-control" type="text" id="example-text-input"
           value="{{ $blog->category }}">

          @error('category')
           <span class="text-danger">{{ $message }}</span>
          @enderror
         </div>
        </div>
        <!-- end row -->

        <!-- end row -->
        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog Category Data">
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
