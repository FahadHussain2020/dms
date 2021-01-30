 <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{URL('admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      

       <!--Salesmen-->
      <li class="nav-item ">
          <a class="nav-link" href="{{URL('admin/viewsalesman')}}">
          <i class="fas fa-fw fa-folder"></i>
          <span>Salesman</span>
        </a>
      </li>
        <!--Suppliers-->
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-truck-moving"></i>
          <span>Suppliers</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{URL('/admin/viewcategory')}}"><i class="far fa-circle"></i>  Manage Categories</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{URL('/admin/viewsupplier')}}"><i class="far fa-circle"></i>  Manage Suppliers</a>
        </div>
      </li>
       <!--Products-->  
         <li class="nav-item ">
          <a class="nav-link" href="{{URL('admin/viewproduct')}}">
          <i class="fab fa-product-hunt"></i>
          <span>Products</span>
        </a>
      </li>
      <!--Retailers-->  
         <li class="nav-item ">
          <a class="nav-link" href="{{URL('admin/viewretailer')}}">
          <i class="fas fa-person-booth"></i>
          <span>Retailers</span>
        </a>
      </li>
      <!--Orders-->  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shopping-cart"></i>
          <span>Orders & invoices</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{URL('/admin/orderpage')}}"><i class="far fa-circle"></i>  Take Order</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{URL('/admin/vieworder')}}"><i class="far fa-circle"></i>  Manage Orders</a>
        </div>
      </li>     
    </ul>