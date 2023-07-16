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

                <h4 class="card-title">Edit Profile Page </h4>

                <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                    @csrf

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" type="text" value="{{ $edit->name }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->

                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" type="email" value="{{ $edit->email }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->


                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">UserName</label>
                    <div class="col-sm-10">
                        <input name="username" class="form-control" type="text" value="{{ $edit->username }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->


                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                    <div class="col-sm-10">
           <input name="profile_image" class="form-control" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->

                  <div class="row mb-3">
                     <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($edit->profile_image))? url('upload/admin/img/'.$edit->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->
    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
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
