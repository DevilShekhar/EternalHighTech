<!DOCTYPE html>
<html lang="en">
   <head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Dashboard</title>
   <meta content="" name="description">
   <meta content="" name="keywords">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Favicons -->
   <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
   <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
   <!-- Google Fonts -->

   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      <!-- Add this to your <head> section if SweetAlert is not included -->
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
         <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
         <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
         <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
           <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
   

   </head>
   <body>
      <div id="app">
         <div class="main-wrapper main-wrapper-1">
            <nav class="navbar navbar-expand-lg main-navbar sticky">
               <div class="form-inline mr-auto">
                  <ul class="navbar-nav mr-3">
                     <li>
                        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                        <i data-feather="align-justify"></i>
                        </a>
                     </li>
                     <li>
                        <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                        <i data-feather="maximize"></i>
                        </a>
                     </li>
                     <li>
                        <form class="form-inline mr-auto">
                           <div class="search-element">
                              <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                              <button class="btn" type="submit">
                              <i class="fas fa-search"></i>
                              </button>
                           </div>
                        </form>
                     </li>
                  </ul>
               </div>
               <ul class="navbar-nav navbar-right">
                  <!-- Messages -->
                  <li class="dropdown dropdown-list-toggle">
                     <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
                     <i data-feather="mail"></i>
                     <span class="badge headerBadge1">6</span>
                     </a>
                     <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                           Messages
                           <div class="float-right">
                              <a href="#">Mark All As Read</a>
                           </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-message">
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-avatar text-white">
                           <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                           </span>
                           <span class="dropdown-item-desc">
                           <span class="message-user">John Deo</span>
                           <span class="time messege-text">Please check your mail !!</span>
                           <span class="time">2 Min Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-avatar text-white">
                           <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                           </span>
                           <span class="dropdown-item-desc">
                           <span class="message-user">Sarah Smith</span>
                           <span class="time messege-text">Request for leave application</span>
                           <span class="time">5 Min Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-avatar text-white">
                           <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                           </span>
                           <span class="dropdown-item-desc">
                           <span class="message-user">Jacob Ryan</span>
                           <span class="time messege-text">Your payment invoice is generated.</span>
                           <span class="time">12 Min Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-avatar text-white">
                           <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                           </span>
                           <span class="dropdown-item-desc">
                           <span class="message-user">Lina Smith</span>
                           <span class="time messege-text">hii John, I have upload doc related to task.</span>
                           <span class="time">30 Min Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-avatar text-white">
                           <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                           </span>
                           <span class="dropdown-item-desc">
                           <span class="message-user">Jalpa Joshi</span>
                           <span class="time messege-text">Please do as specify. Let me know if you have any query.</span>
                           <span class="time">1 Days Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-avatar text-white">
                           <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                           </span>
                           <span class="dropdown-item-desc">
                           <span class="message-user">Sarah Smith</span>
                           <span class="time messege-text">Client Requirements</span>
                           <span class="time">2 Days Ago</span>
                           </span>
                           </a>
                        </div>
                        <div class="dropdown-footer text-center">
                           <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                     </div>
                  </li>
                  <!-- Notifications -->
                  <li class="dropdown dropdown-list-toggle">
                     <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
                     <i data-feather="bell" class="bell"></i>
                     </a>
                     <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                           Notifications
                           <div class="float-right">
                              <a href="#">Mark All As Read</a>
                           </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons">
                           <a href="#" class="dropdown-item dropdown-item-unread">
                           <span class="dropdown-item-icon bg-primary text-white">
                           <i class="fas fa-code"></i>
                           </span>
                           <span class="dropdown-item-desc">
                           Template update is available now!
                           <span class="time">2 Min Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-icon bg-info text-white">
                           <i class="far fa-user"></i>
                           </span>
                           <span class="dropdown-item-desc">
                           <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                           <span class="time">10 Hours Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-icon bg-success text-white">
                           <i class="fas fa-check"></i>
                           </span>
                           <span class="dropdown-item-desc">
                           <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                           <span class="time">12 Hours Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-icon bg-danger text-white">
                           <i class="fas fa-exclamation-triangle"></i>
                           </span>
                           <span class="dropdown-item-desc">
                           Low disk space. Let's clean it!
                           <span class="time">17 Hours Ago</span>
                           </span>
                           </a>
                           <a href="#" class="dropdown-item">
                           <span class="dropdown-item-icon bg-info text-white">
                           <i class="fas fa-bell"></i>
                           </span>
                           <span class="dropdown-item-desc">
                           Welcome to EHT template!
                           <span class="time">Yesterday</span>
                           </span>
                           </a>
                        </div>
                        <div class="dropdown-footer text-center">
                           <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                     </div>
                  </li>
                  <!-- User -->
                  <li class="dropdown">
                     <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                     <img alt="image" src="{{ asset('assets/img/user.png') }}" class="user-img-radious-style">
                     <span class="d-sm-none d-lg-inline-block"></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">Hello Admin</div>
                        <a href="profile.html" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                        </a>
                        <a href="timeline.html" class="dropdown-item has-icon">
                        <i class="fas fa-bolt"></i> Activities
                        </a>
                        <a href="#" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} 
                        <i class="fas fa-sign-out-alt"></i> 
                        </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                     </div>
                  </li>
               </ul>
            </nav>
            <!-- NAVBAR END -->
            <!-- SIDEBAR START -->
            <div class="main-sidebar sidebar-style-2">
               <aside id="sidebar-wrapper">
                  <div class="sidebar-brand">
                     <a href="index.html">
                     <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" />
                     <span class="logo-name">EHT</span>
                     </a>
                  </div>
                  <ul class="sidebar-menu">
                     <li>
                        <a href="{{ route('dashboard') }}" class="nav-link">
                        <i data-feather="monitor"></i><span>Dashboard</span>
                        </a>
                     </li>
                     <li class="dropdown active">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="users"></i><span>User</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ route('users.index') }}">All User</a>
                           </li>
                           <li class="{{ request()->routeIs('users.create') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ route('users.create') }}">Add New User</a>
                           </li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                           <i data-feather="layout"></i><span>Blogs</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="nav-link" href="{{ route('blogs.index') }}">All Blogs</a></li>
                           <li><a class="nav-link" href="{{ route('blogs.create') }}">Add New Blog</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="grid"></i><span>Services</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="nav-link" href="basic-table.html">All Services</a></li>
                           <li><a class="nav-link" href="advance-table.html">Add New Services</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                           <a href="#" class="menu-toggle nav-link has-dropdown">
                              <i data-feather="grid"></i><span>Portfolio</span>
                           </a>
                           <ul class="dropdown-menu">
                              <li><a class="nav-link" href="{{ route('portfolios.index') }}">All Portfolio</a></li>
                              <li><a class="nav-link" href="{{ route('portfolios.create') }}">Add New Portfolio</a></li>
                           </ul>
                        </li>
                     <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="grid"></i><span>Career</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="nav-link" href="basic-table.html">All Career</a></li>
                           <li><a class="nav-link" href="advance-table.html">Add New Career</a></li>
                        </ul>
                     </li>
                    
                     <li class="dropdown {{ request()->routeIs('testimonial.*') ? 'active' : '' }}">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                           <i data-feather="grid"></i><span>Testimonials</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="{{ request()->routeIs('testimonial.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('testimonial.index') }}">All Testimonials</a>
                           </li>
                           <li class="{{ request()->routeIs('testimonial.create') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('testimonial.create') }}">Add New Testimonial</a>
                           </li>
                        </ul>
                     </li>
                      <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="grid"></i><span>Landing Page</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="nav-link" href="basic-table.html">All landing</a></li>
                           <li><a class="nav-link" href="advance-table.html">Add landing</a></li>
                        </ul>
                     </li>
                      <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i data-feather="grid"></i><span>Leads</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="nav-link" href="{{ route('leads.index') }}">All Lead</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="auth-login.html" class="nav-link">
                        <i data-feather="log-out"></i><span>feedback</span>
                        </a>
                     </li>
                     <li>
                        <a href="auth-login.html" class="nav-link">
                        <i data-feather="log-out"></i><span>Logout</span>
                        </a>
                     </li>
                  </ul>
               </aside>
            </div>
            <main id="main-contentmain" class="main-content">
                  @yield('content')
            </main>
         </div>   
      </div>
       <script src="{{ asset('assets/js/app.min.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
      <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
      <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
      <script src="{{ asset('assets/js/scripts.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
        <audio id="leadSound" src="{{ asset('sounds/notification.mp3') }}" preload="auto"></audio>
<script>
let currentLeadId = null;

const leadSound = document.getElementById('leadSound');

// 🔓 UNLOCK AUDIO (VERY IMPORTANT)
document.addEventListener('click', function () {
    leadSound.play().then(() => {
        leadSound.pause();
        leadSound.currentTime = 0;
    }).catch(() => {});
}, { once: true });

setInterval(function () {

    fetch('/check-lead', {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => {
        if (!res.ok) throw new Error("Check failed " + res.status);
        return res.json();
    })
    .then(data => {

        console.log("LEAD DATA:", data);

        // ❌ no lead
        if (!data || !data.id) {
            currentLeadId = null;
            return;
        }

        // ❌ prevent duplicate popup
        if (currentLeadId === data.id) return;

        currentLeadId = data.id;

        Swal.fire({
            title: "🚀 New Lead Assigned",
            html: `
                <b>Name:</b> ${data.name}<br>
                <b>Phone:</b> ${data.phone}<br>
                <b>Service:</b> ${data.services}<br>
                <b>Budget:</b> ${data.budget}
            `,
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "Accept Lead",
            cancelButtonText: "Ignore",
            allowOutsideClick: false,
            allowEscapeKey: false,
            timer: 300000,
            timerProgressBar: true,

            // 🔊 SOUND PLAY HERE
            didOpen: () => {
                setTimeout(() => {
                    leadSound.currentTime = 0;
                    leadSound.play().then(() => {
                        console.log("Sound played ✅");
                    }).catch(err => {
                        console.log("Sound blocked ❌", err);
                    });
                }, 200);
            }
        }).then((result) => {

            // 🛑 STOP SOUND
            leadSound.pause();
            leadSound.currentTime = 0;

            if (result.isConfirmed) {

                fetch(`/accept-lead/${data.id}`, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(res => {

                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Assigned!',
                            text: 'Lead assigned to you.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.error || 'Already assigned'
                        });
                    }

                    currentLeadId = null;
                })
                .catch(() => {
                    currentLeadId = null;
                });

            } else {

                fetch(`/skip-lead/${data.id}`, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({})
                })
                .then(() => {
                    currentLeadId = null;
                })
                .catch(() => {
                    currentLeadId = null;
                });
            }

        });

    })
    .catch(err => {
        console.error("CHECK ERROR:", err);
    });

}, 3000);
</script>
   </body>
</html>
