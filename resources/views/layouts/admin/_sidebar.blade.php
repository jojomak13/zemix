<nav class="pcoded-navbar">
   <div class="nav-list">
      <div class="pcoded-inner-navbar main-menu">
         <div class="pcoded-navigation-label">Navigation</div>
         
         <ul class="pcoded-item pcoded-left-item">
            <li>
               <a href="{{ route('admin.home') }}" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                  <span class="pcoded-mtext">Dashboard</span>
               </a>
            </li>
            
            {{-- Start Orders --}}
            @if(auth()->user()->isAbleTo('read_orders'))
            <li class="pcoded-hasmenu">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                  <span class="pcoded-mtext">Orders</span>
               </a>
               <ul class="pcoded-submenu">
                  <li>
                     <a href="{{ route('admin.orders.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Orders</span>
                     </a>
                  </li>
                  @if(auth()->user()->isAbleTo('create_orders'))
                  <li>
                     <a href="{{ route('admin.orders.create') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">New Order</span>
                     </a>
                  </li>
                  @endif
               </ul>
            </li>
            @endif
            {{-- End Orders --}}

            {{-- Start Drivers --}}
            @if(auth()->user()->isAbleTo('read_drivers'))
            <li class="pcoded-hasmenu">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                  <span class="pcoded-mtext">Drivers</span>
               </a>
               <ul class="pcoded-submenu">
                  <li>
                     <a href="{{ route('admin.drivers.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Drivers</span>
                     </a>
                  </li>
                  @if(auth()->user()->isAbleTo('create_drivers'))
                  <li>
                     <a href="{{ route('admin.drivers.create') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">New Driver</span>
                     </a>
                  </li>
                  @endif
               </ul>
            </li>
            @endif
            {{-- End Drivers --}}

            {{-- Start Seller --}}
            @if(auth()->user()->isAbleTo('read_sellers'))
            <li class="pcoded-hasmenu">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                  <span class="pcoded-mtext">Sellers</span>
               </a>
               <ul class="pcoded-submenu">
                  <li>
                     <a href="{{ route('admin.sellers.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Sellers</span>
                     </a>
                  </li>
                  @if(auth()->user()->isAbleTo('create_sellers'))
                  <li>
                     <a href="{{ route('admin.sellers.create') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">New Seller</span>
                     </a>
                  </li>
                  @endif
               </ul>
            </li>
            @endif
            {{-- End Seller --}}

            {{-- Start Cities --}}
            @if(auth()->user()->isAbleTo('read_cities'))
            <li class="pcoded-hasmenu">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-map-pin"></i></span>
                  <span class="pcoded-mtext">Cities</span>
               </a>
               <ul class="pcoded-submenu">
                  <li>
                     <a href="{{ route('admin.cities.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Cities</span>
                     </a>
                  </li>
                  @if(auth()->user()->isAbleTo('create_cities'))
                  <li>
                     <a href="{{ route('admin.cities.create') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">New City</span>
                     </a>
                  </li>
                  @endif
               </ul>
            </li>
            @endif
            {{-- End Cities --}}
            
            {{-- Start Admins --}}
            @if(auth()->user()->isAbleTo('read_admins'))
            <li class="pcoded-hasmenu">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                  <span class="pcoded-mtext">Admins</span>
               </a>
               <ul class="pcoded-submenu">
                  <li>
                     <a href="{{ route('admin.admins.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Admins</span>
                     </a>
                  </li>
                  @if(auth()->user()->isAbleTo('create_admins'))
                  <li>
                     <a href="{{ route('admin.admins.create') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">New Admin</span>
                     </a>
                  </li>
                  @endif
               </ul>
            </li>
            @endif
            {{-- End Admins --}}

            {{-- Start Roles & Permissions --}}
            @if(auth()->user()->isAbleTo('read_roles'))
            <li class="pcoded-hasmenu">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-lock"></i></span>
                  <span class="pcoded-mtext">Roles & Permissions</span>
               </a>
               <ul class="pcoded-submenu">
                  <li>
                     <a href="{{ route('admin.roles.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Roles</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('admin.permissions.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Permissions</span>
                     </a>
                  </li>
               </ul>
            </li>
            @endif
            {{-- End Roles & Permissions --}}
         </ul>

      </div>
   </div>
</nav>