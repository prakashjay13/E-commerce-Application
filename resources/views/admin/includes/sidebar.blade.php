<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Ecomm-Application</a>
            </div>
        </div>

        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/home" class="{{request()->is('home*') ? 'active' : ''}} nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/users" class="{{request()->is('users*') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                        <p>
                            User Management
                            
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/banners" class="{{request()->is('banners*') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-image" aria-hidden="true"></i>&nbsp;
                        <p>
                            Banner Management
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/coupons" class="{{request()->is('coupons*') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;
                        <p>
                          Coupons
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/cms" class="{{request()->is('cms*') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-file" aria-hidden="true"></i>&nbsp;
                        <p>
                          CMS
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/categories" class="{{request()->is('categories*') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;
                        <p>
                          Categories
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/products" class="{{request()->is('products*') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;
                        <p>
                          Products
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/users/show" class="{{request()->is('users/show') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-address-book" aria-hidden="true"></i>&nbsp;
                        <p>
                          Contact Us
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/checkout" class="{{request()->is('checkout') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;
                        <p>
                          Customer Address
                           
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item menu-open">
                    <a href="/order" class="{{request()->is('order') ? 'active' : ''}} nav-link ">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;
                        <p>
                          Customer Orders
                           
                        </p>
                    </a>
                    
                </li>
               

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
