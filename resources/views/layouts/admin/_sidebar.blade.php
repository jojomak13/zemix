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
            
            <li>
               <a href="{{ route('admin.cities.index') }}" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-map-pin"></i></span>
                  <span class="pcoded-mtext">Cities</span>
               </a>
            </li>
         </ul>

      </div>
   </div>
</nav>