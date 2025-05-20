<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <a href="/" class="logo-icon">
      <img src="{{ asset('/assets/images/topsisnobg.png') }}" class="logo-img" alt="">
    </a>
    <a href="/" class="logo-name flex-grow-1">
      <h5 class="mb-0">PT BENDHARD</h5>
      {{-- <h5>SCHULTE SHIPMANAGEMENT</h5>
      <b><b>PT BENDHARD</b> SCHULTE SHIPMANAGEMENT</b> --}}
    </a>
    <div class="sidebar-close">
      <span class="material-icons-outlined">close</span>
    </div>
  </div>
  <div class="sidebar-nav">
    <ul class="metismenu" id="sidenav">
      <li class="{{ request()->is('dashboard') || request()->is('profile') ? 'mm-active' : '' }}">
        <a href="/dashboard">
          <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      <li class="menu-label">UI Elements</li>
      <li class="{{ request()->is('property*') || request()->is('karyawan*') || request()->is('unit*') ? 'mm-active' : '' }}">
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon"><i class="material-icons-outlined">description</i></div>
          <div class="menu-title">Master Data</div>
        </a>
        <ul class="{{ request()->is('kriteria*') || request()->is('karyawan*') || request()->is('unit*') ? 'mm-show' : '' }}">
          <li class="{{ request()->is('karyawan*') ? 'active' : '' }}">
            <a href="/karyawan"><i class="material-icons-outlined">person_add</i>Karyawan</a>
          </li>
          <li class="{{ request()->is('kriteria*') ? 'active' : '' }}">
            <a href="/kriteria"><i class="material-icons-outlined">menu</i>Kriteria</a>
          </li>
          {{-- <li class="{{ request()->is('unit*') ? 'active' : '' }}">
            <a href="/unit"><i class="material-icons-outlined">bed</i>Unit</a>
          </li> --}}
        </ul>     
      </li>
      <li class="">
        <a href="/topsis">
          <div class="parent-icon"><i class="material-icons-outlined">data_thresholding</i></div>
          <div class="menu-title">Topsis</div>
        </a>
      </li>
      {{-- <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2 border-0 bg-transparent" style="cursor: pointer;">
            <i class="material-icons-outlined">power_settings_new</i>Logout
        </button>
      </form> --}}
    </ul>
  </div>
</aside>