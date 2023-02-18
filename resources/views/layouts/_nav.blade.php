<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          <img src="{{asset('/image/perfil.png')}}" alt="image"/>
        </div>
        <div class="profile-name">
          <p class="name">
            Bienvenido {{ Auth::user()->name }}
          </p>
          <p class="designation">
            {{ Auth::user()->email }}
          </p>
        </div>
      </div>
    </li>

    @can('home')
      <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
      </li>
    @endcan

    @can('reports.day')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
          <i class="fas fa-chart-line menu-icon"></i>
          <span class="menu-title">Reportes</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="apps">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('reports.day')}}"> Reportes por día </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('reports.date')}}"> Reportes por fecha </a></li>
          </ul>
        </div>
      </li>
    @endcan
    
    @can('receipts.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('receipts.index')}}">
          <i class="fas fa-cart-plus menu-icon"></i>
          <span class="menu-title">Compras</span>
        </a>
      </li>
    @endcan

    @can('sales.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
          <i class="fas fa-shopping-cart menu-icon"></i>
          <span class="menu-title">Ventas</span>
        </a>
      </li>
    @endcan

    @can('categories.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('categories.index')}}">
          <i class="fas fa-sitemap menu-icon"></i>
          <span class="menu-title">Categorías</span>
        </a>
      </li>
    @endcan
    
    @can('suppliers.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('suppliers.index')}}">
          <i class="fas fa-shipping-fast menu-icon"></i>
          <span class="menu-title">Proveedores</span>
        </a>
      </li>
    @endcan

    @can('products.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
          <i class="fas fa-boxes menu-icon"></i>
          <span class="menu-title">Productos</span>
        </a>
      </li>
    @endcan
    
    @can('customers.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('customers.index')}}">
          <i class="fas fa-users menu-icon"></i>
          <span class="menu-title">Clientes</span>
        </a>
      </li>
    @endcan
    
    @can('users.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-user-tag menu-icon"></i>
            <span class="menu-title">Usuarios</span>
        </a>
      </li>
    @endcan

    @can('roles.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('roles.index')}}">
            <i class="fas fa-user-cog menu-icon"></i>
            <span class="menu-title">Roles</span>
        </a>
      </li>
    @endcan

    @can('commerce.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('commerce.index')}}">
          <i class="far fa-file-alt menu-icon"></i>
          <span class="menu-title">Negocio</span>
        </a>
      </li>
    @endcan
  </ul>
</nav>