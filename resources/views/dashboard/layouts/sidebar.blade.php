<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <a href="/" class="logo-icon">
      <img src="{{ asset('/assets/images/topsisnobg.png') }}" class="logo-img" alt="">
    </a>
    <a href="/" class="logo-name flex-grow-1">
      <h5 class="mb-0">PT BENDHARD</h5>
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

      @can('admin')
        <li class="menu-label">Administrator</li>
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
          </ul>     
        </li>
        <li class="">
          <a href="/topsis">
            <div class="parent-icon"><i class="material-icons-outlined">data_thresholding</i></div>
            <div class="menu-title">Topsis</div>
          </a>
        </li>
      @endcan
      <li class="">
        <a href="/list-terbaik">
          <div class="parent-icon"><i class="material-icons-outlined">emoji_events</i></div>
          <div class="menu-title">Karyawan Terbaik</div>
        </a>
      </li>
    </ul>
  </div>
</aside>
