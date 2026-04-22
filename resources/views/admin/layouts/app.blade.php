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
      @yield('style')

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
                        </div>
                        <div class="dropdown-footer text-center">
                           <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                     </div>
                  </li>
                  <!-- User -->
                  <li class="dropdown">
                     <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                     @php
                     $user = Auth::user();
                     @endphp
                     @if($user && $user->profile_photo)
                     <img src="{{ asset('storage/' . $user->profile_photo) }}"
                        class="user-img-radious-style"
                        alt="{{ $user->name }}">
                     @else
                     <img src="{{ asset('assets/img/user.png') }}"
                        class="user-img-radious-style"
                        alt="Default User">
                     @endif
                     <span class="d-sm-none d-lg-inline-block"></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">
                           Role {{ Auth::user()->role }}
                        </div>
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

                     {{-- Dashboard --}}
                     <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                              <i data-feather="monitor"></i><span>Dashboard</span>
                        </a>
                     </li>

                     {{-- ONLY ADMIN --}}
                     @if(auth()->check() && auth()->user()->role === 'admin')

                     {{-- Users --}}
                     <li class="dropdown {{ request()->routeIs('users.*') ? 'active' : '' }}">
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

                     {{-- Home Banner --}}
                     <li class="dropdown {{ request()->routeIs('home-banner.*') ? 'active' : '' }}">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                           <i data-feather="home"></i><span>Home Banner</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="{{ request()->routeIs('home-banner.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('home-banner.index') }}">All</a>
                           </li>
                           <li class="{{ request()->routeIs('home-banner.create') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('home-banner.create') }}">Add</a>
                           </li>
                        </ul>
                     </li>
                     
                     {{-- Blogs --}}
                     <li class="dropdown {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                              <i data-feather="layout"></i><span>Blogs</span>
                        </a>
                        <ul class="dropdown-menu">
                              <li class="{{ request()->routeIs('blogs.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('blogs.index') }}">All Blogs</a>
                              </li>
                              <li class="{{ request()->routeIs('blogs.create') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('blogs.create') }}">Add New Blog</a>
                              </li>
                        </ul>
                     </li>

                     {{-- Services --}}
                     <li class="dropdown {{ request()->routeIs('service-category.*') || request()->routeIs('services.*') ? 'active' : '' }}">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                              <i data-feather="layout"></i><span>Services</span>
                        </a>
                        <ul class="dropdown-menu">
                              <li class="{{ request()->routeIs('service-category.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('service-category.index') }}">All Category</a>
                              </li>
                              <li class="{{ request()->routeIs('service-category.create') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('service-category.create') }}">Add Category</a>
                              </li>
                              <li class="{{ request()->routeIs('services.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('services.index') }}">All Services</a>
                              </li>
                              <li class="{{ request()->routeIs('services.create') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('services.create') }}">Add Services</a>
                              </li>
                        </ul>
                     </li>

                     {{-- Portfolio --}}
                     <li class="dropdown {{ request()->routeIs('portfolios.*') ? 'active' : '' }}">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                              <i data-feather="grid"></i><span>Portfolio</span>
                        </a>
                        <ul class="dropdown-menu">
                              <li class="{{ request()->routeIs('portfolios.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('portfolios.index') }}">All Portfolio</a>
                              </li>
                              <li class="{{ request()->routeIs('portfolios.create') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('portfolios.create') }}">Add New Portfolio</a>
                              </li>
                        </ul>
                     </li>

                     {{-- Career --}}
                     <li class="dropdown {{ request()->routeIs('career.*') ? 'active' : '' }}">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                              <i data-feather="briefcase"></i><span>Career</span>
                        </a>
                        <ul class="dropdown-menu">
                              <li class="{{ request()->routeIs('career.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('career.index') }}">All Career</a>
                              </li>
                              <li class="{{ request()->routeIs('career.create') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('career.create') }}">Add Career</a>
                              </li>
                        </ul>
                     </li>

                     {{-- Testimonials --}}
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
                  @endif
                     {{-- Leads Dropdown --}}
                     <li class="dropdown {{ request()->routeIs('leads.*') ? 'active' : '' }}">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                           <i data-feather="grid"></i><span>Leads</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="{{ request()->routeIs('leads.index') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('leads.index') }}">All Leads</a>
                           </li>

                           <li class="{{ request()->routeIs('reminders.list') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('reminders.list') }}">Reminder Leads</a>
                           </li>

                           <li class="{{ request()->routeIs('completed.list') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('completed.list') }}">Completed Leads</a>
                           </li>
                           @if(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'sales_head'))
                           <li class="{{ request()->routeIs('filter.leads') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ route('filter.leads') }}">Filter Leads</a>
                           </li>
                           @endif
                           <li class="{{ request()->routeIs('leads.inprogress') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ route('leads.inprogress') }}">Inprogress Leads</a>
                           </li>
                        </ul>
                     </li>

                     

                     {{-- Logout --}}
                     <li>
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i data-feather="log-out"></i><span>Logout</span>
                        </a>
                     </li>

                  </ul>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
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
      <!-- 🔊 SOUND -->
      <audio id="leadSound" src="{{ asset('sounds/notification.mp3') }}" preload="auto"></audio>
      <script>
         let isPopupOpen = false;
         
         const leadSound = document.getElementById('leadSound');
         
         //  UNLOCK AUDIO (browser requirement)
         document.addEventListener('click', function () {
            leadSound.play().then(() => {
               leadSound.pause();
               leadSound.currentTime = 0;
            }).catch(() => {});
         }, { once: true });
         
         setInterval(function () {
         
            //  do not run if popup already open
            if (isPopupOpen) return;
         
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
         
               if (!data || !data.id) return;
         
               isPopupOpen = true;
         
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
         
                     //  CONTINUOUS SOUND
                     didOpen: () => {
         
                        leadSound.loop = true; // 🔁 repeat forever
                        leadSound.currentTime = 0;
         
                        leadSound.play()
                           .then(() => console.log("🔊 Sound playing..."))
                           .catch(err => console.log("❌ Sound blocked:", err));
                     }
               }).then((result) => {
         
                     //  STOP SOUND COMPLETELY
                     leadSound.pause();
                     leadSound.currentTime = 0;
                     leadSound.loop = false;
         
                     isPopupOpen = false;
         
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
                                    text: 'Lead assigned to you.',
                                    timer: 1500,
                                    showConfirmButton: false,
                                    willClose: () => {
                                          //  REDIRECT ADDED
                                          window.location.href = '/leads';
                                    }
                                 });
                              } else {
                                 Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: res.error || 'Already assigned'
                                 });
                              }
         
                        })
                        .catch(err => console.error(err));
         
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
                        .catch(err => console.error(err));
                     }
         
               });
         
            })
            .catch(err => {
               console.error("CHECK ERROR:", err);
            });
         
         }, 3000);
      </script>
      <script>
         setInterval(function () {
         
            fetch('/check-followups')
            .then(res => res.json())
            .then(data => {
         
               if (!data.status) return;
         
               let html = '';
         
               data.data.forEach(f => {
                     html += `
                        <div style="text-align:left; margin-bottom:10px;">
                           <b>${f.lead.name}</b><br>
                           ⏰ ${new Date(f.next_followup_date).toLocaleTimeString()}<br>
                           <small>${f.note}</small>
                        </div>
                     `;
               });
         
               Swal.fire({
                     title: "⏰ Follow-up Reminder",
                     html: html,
                     icon: "warning",
                     confirmButtonText: "OK"
               });
         
            });
         
         }, 60000);
      </script>
   </body>
</html>