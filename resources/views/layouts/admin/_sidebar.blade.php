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
            
            {{-- Start Cities --}}
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
                  <li>
                     <a href="{{ route('admin.cities.create') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">New city</span>
                     </a>
                  </li>
               </ul>
            </li>
            {{-- End Cities --}}

            {{-- Start Seller --}}
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
                  <li>
                     <a href="{{ route('admin.sellers.create') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">New Seller</span>
                     </a>
                  </li>
               </ul>
            </li>
            {{-- End Seller --}}

         </ul>

      </div>
   </div>
</nav>