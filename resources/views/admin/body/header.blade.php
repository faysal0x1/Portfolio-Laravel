<header id="page-topbar">
 <div class="navbar-header">
  <div class="d-flex">

   @php

    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
   @endphp
   <!-- LOGO -->
   <div class="navbar-brand-box">
    <a href="{{ route('dashboard') }}" class="logo logo-dark">
     <span class="logo-sm">
      <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm" height="22">
     </span>
     <span class="logo-lg">
      <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-dark" height="20">
     </span>
    </a>

    <a href="{{ route('dashboard') }}" class="logo logo-light">
     <span class="logo-sm">
      <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm-light" height="22">
     </span>
     <span class="logo-lg">
      <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo-light" height="20">
     </span>
    </a>
   </div>

   <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
    <i class="ri-menu-2-line align-middle"></i>
   </button>

  </div>

  <div class="d-flex">
   <div class="dropdown d-none d-lg-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown" aria-haspopup="true"
     aria-expanded="false">
     <i class="ri-apps-2-line"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
     <div class="px-lg-2">
      <div class="row g-0">
       <div class="col">
        <a class="dropdown-icon-item" href="#">
         <img src="{{ asset('backend/assets/images/brands/github.png') }}" alt="Github">
         <span>GitHub</span>
        </a>
       </div>
       <div class="col">
        <a class="dropdown-icon-item" href="#">
         <img src="{{ asset('backend/assets/images/brands/bitbucket.png') }}" alt="bitbucket">
         <span>Bitbucket</span>
        </a>
       </div>
       <div class="col">
        <a class="dropdown-icon-item" href="#">
         <img src="{{ asset('backend/assets/images/brands/dribbble.png') }}" alt="dribbble">
         <span>Dribbble</span>
        </a>
       </div>
      </div>

      <div class="row g-0">
       <div class="col">
        <a class="dropdown-icon-item" href="#">
         <img src="{{ asset('backend/assets/images/brands/dropbox.png') }}" alt="dropbox">
         <span>Dropbox</span>
        </a>
       </div>
       <div class="col">
        <a class="dropdown-icon-item" href="#">
         <img src="{{ asset('backend/assets/images/brands/mail_chimp.png') }}" alt="mail_chimp">
         <span>Mail Chimp</span>
        </a>
       </div>
       <div class="col">
        <a class="dropdown-icon-item" href="#">
         <img src="{{ asset('backend/assets/images/brands/slack.png') }}" alt="slack">
         <span>Slack</span>
        </a>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="dropdown d-none d-lg-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
     <i class="ri-fullscreen-line"></i>
    </button>
   </div>
   {{-- Notification --}}
   <div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
     data-bs-toggle="dropdown" aria-expanded="false">
     <i class="ri-notification-3-line"></i>
     <span class="noti-dot"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
     aria-labelledby="page-header-notifications-dropdown">
     <div class="p-3">
      <div class="row align-items-center">
       <div class="col">
        <h6 class="m-0"> Notifications </h6>
       </div>
       <div class="col-auto">
        <a href="#!" class="small"> View All</a>
       </div>
      </div>
     </div>
     <div data-simplebar style="max-height: 230px;">
      <a href="" class="text-reset notification-item">
       <div class="d-flex">
        <div class="avatar-xs me-3">
         <span class="avatar-title bg-primary rounded-circle font-size-16">
          <i class="ri-shopping-cart-line"></i>
         </span>
        </div>
        <div class="flex-1">
         <h6 class="mb-1">Your order is placed</h6>
         <div class="font-size-12 text-muted">
          <p class="mb-1">If several languages coalesce the grammar</p>
          <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
         </div>
        </div>
       </div>
      </a>
      <a href="" class="text-reset notification-item">
       <div class="d-flex">
        <img src="{{ asset('backend/assets/images/users/avatar-3.jpg') }}" class="me-3 rounded-circle avatar-xs"
         alt="user-pic">
        <div class="flex-1">
         <h6 class="mb-1">James Lemire</h6>
         <div class="font-size-12 text-muted">
          <p class="mb-1">It will seem like simplified English.</p>
          <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
         </div>
        </div>
       </div>
      </a>
      <a href="" class="text-reset notification-item">
       <div class="d-flex">
        <div class="avatar-xs me-3">
         <span class="avatar-title bg-success rounded-circle font-size-16">
          <i class="ri-checkbox-circle-line"></i>
         </span>
        </div>
        <div class="flex-1">
         <h6 class="mb-1">Your item is shipped</h6>
         <div class="font-size-12 text-muted">
          <p class="mb-1">If several languages coalesce the grammar</p>
          <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
         </div>
        </div>
       </div>
      </a>

      <a href="" class="text-reset notification-item">
       <div class="d-flex">
        <img src="{{ asset('backend/assets/images/users/avatar-4.jpg') }}" class="me-3 rounded-circle avatar-xs"
         alt="user-pic">
        <div class="flex-1">
         <h6 class="mb-1">Salena Layfield</h6>
         <div class="font-size-12 text-muted">
          <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
          <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
         </div>
        </div>
       </div>
      </a>
     </div>
     <div class="p-2 border-top">
      <div class="d-grid">
       <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
        <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
       </a>
      </div>
     </div>
    </div>
   </div>

   <div class="dropdown d-inline-block user-dropdown">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <img class="rounded-circle header-profile-user"
      src="{{ !empty($user->profile_image) ? url('upload/admin/img/' . $user->profile_image) : url('upload/no_image.jpg') }}"
      alt="Header Avatar">
     <span class="d-none d-xl-inline-block ms-1">{{ $user->username }}</span>
     <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
     <!-- item-->
     <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i>
      Profile</a>

     <a class="dropdown-item" href="{{ route('change.password') }}"><i class="ri-wallet-2-line align-middle me-1"></i>
      Change Password
     </a>
     <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i
       class="ri-settings-2-line align-middle me-1"></i> Settings</a>
     <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock
      screen</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
       class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
    </div>
   </div>

   <div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
     <i class="ri-settings-2-line"></i>
    </button>
   </div>

  </div>
 </div>
</header>
