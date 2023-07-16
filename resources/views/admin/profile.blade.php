@extends('admin.admin_master')

@section('admin')
 <div class="page-content">
  <div class="container-fluid">
   <div class="row">

    <div class="col-lg-4">
     <div class="card">
      <br>
      <center>
       <img class="rounded-circle avatar-xl"
        src="{{ !empty($user->profile_image)
            ? url('upload/admin/img/' . $user->profile_image)
            : url('upload/no_image.jpg') }}"
        alt="Card image cap">
      </center>

      <div class="card-body">
       <h4 class="card-title">Name : {{ $user->name }}</h4>
       <hr>
       <h4 class="card-title">Email : {{ $user->email }}</h4>
       <hr>
       <h4 class="card-title">User Name : {{ $user->username }}</h4>
       <hr>

       <a class="btn btn-info btn-rounded waves-effect waves-light" href="{{ route('edit.profile') }}">Edit Profile</a>
      </div>
     </div>
    </div>

   </div>
   {{-- end card --}}

  </div>
 </div>
@endsection
