 <header class="top-navbar">
     <div class="d-flex align-items-center">
         <button class="btn btn-light d-lg-none me-3 shadow-sm" type="button" data-bs-toggle="offcanvas"
             data-bs-target="#sidebar" aria-controls="sidebar">
             <i class="bi bi-list fs-4"></i>
         </button>

         <h4 class="mb-0 fw-bold">Faiz Fashion Admin</h4>
     </div>

     <div class="d-flex align-items-center gap-3">
         <!-- User Settings Dropdown -->
         <div class="dropdown">
             <button class="btn btn-sm btn-light dropdown-toggle d-flex align-items-center gap-2 shadow-sm"
                 type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="bi bi-person-circle fs-5"></i>
                 <span class="d-none d-md-inline text-dark">{{ Auth::user()->name }}</span>
                 <i class="bi bi-chevron-down fs-6"></i>
             </button>
             <ul class="dropdown-menu dropdown-menu-end shadow">
                 <li>
                     <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                 </li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li>
                     <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                         <i class="bi bi-person fs-5"></i>
                         {{ __('Profile') }}
                     </a>
                 </li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li>
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <a class="dropdown-item d-flex align-items-center gap-2 text-danger"
                             href="{{ route('logout') }}"
                             onclick="event.preventDefault(); this.closest('form').submit();">
                             <i class="bi bi-box-arrow-right fs-5"></i>
                             {{ __('Log Out') }}
                         </a>
                     </form>
                 </li>
             </ul>
         </div>
     </div>
 </header>
