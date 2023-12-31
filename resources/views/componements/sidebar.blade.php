 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->
         <div class="user-profile text-center mt-3">
             <div class="">
                 <img src="{{ !empty(Auth::user()->profile) ? url(Auth::user()->profile) : url('images/no_image.jpeg') }}"
                     alt="" class="avatar-md rounded-circle">
             </div>
             <div class="mt-3">
                 <h4 class="font-size-16 mb-1">{{ Auth::user()->name }}</h4>
                 <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                     {{ Auth::user()->role }} </span>
             </div>
         </div>

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="/" class="waves-effect">
                         <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                         <span>Dashboard</span>
                     </a>
                 </li>
                 <li>
                     <a href="/" class="waves-effect">
                         <i class="fas fa-home"></i>
                         <span>Home</span>
                     </a>
                 </li>
                 @if (auth()->user()->role === 'hr')
                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <i class="fas fa-users"></i>
                             <span>Employee Management</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li><a href="{{ route('employee') }}">All Employee</a></li>
                             <li><a href="{{ route('employee.create') }}">Add Employee</a></li>
                         </ul>
                     </li>
                 @endif

                 {{-- <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fas fa-users"></i>
                         <span>Employee Mangement</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('employee') }}">All Employee</a></li>
                         <li><a href="{{ route('employee.create') }}">Add Employee</a></li>
                     </ul>
                 </li> --}}



                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Email</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="email-inbox.html">Inbox</a></li>
                         <li><a href="email-read.html">Read Email</a></li>
                     </ul>
                 </li>



                 <li class="menu-title">Pages</li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-account-circle-line"></i>
                         <span>Authentication</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="auth-login.html">Login</a></li>
                         <li><a href="auth-register.html">Register</a></li>
                         <li><a href="auth-recoverpw.html">Recover Password</a></li>
                         <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                     </ul>
                 </li>


             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
