<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
       <a href="{{ route('admin.dashboard') }}"> <img alt="image" src="" class="header-logo" /> <spansdf
            class="logo-name"></span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown">
          <a href="" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>


          <li class="dropdown ">
              <a href="{{ route('admin.apartments.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>Apartments</span></a>
          </li>
          <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-car-alt"></i> <span>Cars</span>
              </a>
              <ul class="dropdown-menu" style="display: none;">
                  <li><a class="nav-link" href="{{ route('admin.cars.index') }}">Cars</a></li>
                  <li><a class="nav-link" href="{{route('admin.clentscar.index')}}">Clents_cars show</a></li>
              </ul>
          </li>

          <li class="dropdown ">
              <a href="{{ route('admin.clents.index') }}" class="nav-link"><i class="fas fa-american-sign-language-interpreting"></i><span>CLENTS</span></a>
          </li>



      </ul>
    </aside>
  </div>

