@extends('admin.admin_master')

@section('admin')
 <div class="page-content">
  <div class="container-fluid">
   <div class="row">
    <div class="col-12">
     <div class="card">
      <div class="card-body">

       <h4 class="card-title"> Change Password Page </h4>

       @if (count($errors))
        @foreach ($errors->all() as $error)
         <p class="alert alert-danger alert-dismissable fade show">
          {{ $error }}
         </p>
        @endforeach
       @endif

       <form method="post" action="{{ route('update.password') }}" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
         <div class="col-sm-10">
          <input name="oldPass" class="form-control" type="password" value="" id="oldPass">
         </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
         <div class="col-sm-10">
          <input name="newPass" class="form-control" type="password" value="" id="newPass">
         </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
         <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
         <div class="col-sm-10">
          <input name="confirmPass" class="form-control" type="password" value="" id="confirmPass">
         </div>
        </div>
        <!-- end row -->

        <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
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
