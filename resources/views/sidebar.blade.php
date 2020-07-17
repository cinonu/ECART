  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Shopper</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{asset('admin')}}" class="d-block">Harsh Narigra</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            {{-- <a href="#" class="nav-link active"> --}}
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{asset('admin/user')}}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
              <p>Manage Users</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{asset('admin/user/config')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Change Configuration</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{asset('admin/banners')}}" class="nav-link">
                  <i class="nav-icon fas fa-images"></i>
              <p>Banner Management</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{asset('admin/categories')}}" class="nav-link">
                  <i class="nav-icon fa fa-tags"></i>
                  <p>Manage Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/product')}}" class="nav-link">
                  <i class="nav-icon fa fa-shopping-bag"></i>
              <p>Manage Product</p>
                </a>
              </li>
                
                <li class="nav-item">
                <a href="{{asset('admin/coupons')}}" class="nav-link">
                   <i class="nav-icon fa fa-tag fa-lg"></i>
             <p>Manage Coupon</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{asset('admin/ManageOrders')}}" class="nav-link">
                  <i class="fa fa-shopping-cart"></i>
                  <p>order management</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{asset('admin/Contactus')}}" class="nav-link">
                 <i style='font-size:19px' class='fas'>&#xf3ff;</i>
                 <p>Raised Tickets</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('admin/Reports')}}" class="nav-link">
                 <i class="fa fa-book"></i>
                 <p>Reports</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                ADD PAGES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('admin/cms')}}" class="nav-link">
               <i class="fa fa-file" aria-hidden="true"></i>
                <p>Add About US PAGE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/EmailTemplates')}}" class="nav-link">
               <i class="fa fa-file" aria-hidden="true"></i>
                <p>CHANGE EMAIL TEMPLATE</p>
                </a>
              </li>
               
            </ul>
          </li>
          






                </ul>
               
          </li>


           {{-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Change Configuration
               <i class="right fas fa-angle-left"></i>
              </p>
            </a> --}}

           
         
        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>