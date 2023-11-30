<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{url('logo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
               <li class="nav-item">
                <a href="{{ route('bookings') }}" class="nav-link {{ Request::is('bookings') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Bookings</p>
                </a>
          </li>
           <li class="nav-item">
                <a href="{{ route('media') }}" class="nav-link {{ Request::is('media') ? 'active' : '' }}">
                    <i class="nav-icon far fa-image"></i>
                    <p>Media</p>
                </a>
          </li>
            </ul>
        </nav>

    </div>

</aside>
