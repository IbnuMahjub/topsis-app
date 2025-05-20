<header class="top-header">
  <nav class="navbar navbar-expand align-items-center gap-4">
    <div class="btn-toggle">
      <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
    </div>
    <div class="search-bar flex-grow-1">
      <div class="position-relative">
        <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Search">
        <span class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
        <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
        <div class="search-popup p-3">
          <div class="card rounded-4 overflow-hidden">
            <div class="card-header d-lg-none">
              <div class="position-relative">
                <input class="form-control rounded-5 px-5 mobile-search-control" type="text" placeholder="Search">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
               </div>
            </div>
            <div class="card-body search-content">
              <p class="search-title">Recent Searches</p>
              <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Sass</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                    class="material-icons-outlined fs-6">search</i></a>
              </div>
              <hr>
              <p class="search-title">Tutorials</p>
              <div class="search-list d-flex flex-column gap-2">
                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="list-icon">
                    <i class="material-icons-outlined fs-5">play_circle</i>
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                  </div>
                </div>
                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="list-icon">
                    <i class="material-icons-outlined fs-5">shopping_basket</i>
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                  </div>
                </div>

                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="list-icon">
                    <i class="material-icons-outlined fs-5">laptop</i>
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title">Responsive Design</h5>
                  </div>
                </div>
              </div>

              <hr>
              <p class="search-title">Members</p>

              <div class="search-list d-flex flex-column gap-2">
                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="memmber-img">
                    <img src="{{ asset('vertical/assets/images/avatars/01.png') }}" width="32" height="32" class="rounded-circle" alt="">
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                  </div>
                </div>

                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="memmber-img">
                    <img src="{{ asset('vertical/assets/images/avatars/02.png') }}" width="32" height="32" class="rounded-circle" alt="">
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                  </div>
                </div>

                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="memmber-img">
                    <img src="assets/images/avatars/03.png" width="32" height="32" class="rounded-circle" alt="">
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title">Michle Clark</h5>
                  </div>
                </div>

              </div>
            </div>
            <div class="card-footer text-center bg-transparent">
              <a href="javascript:;" class="btn w-100">See All Search Results</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul class="navbar-nav gap-1 nav-right-links align-items-center">
      <li class="nav-item d-lg-none mobile-search-btn">
        <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
      </li>
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;" data-bs-toggle="dropdown"><img src="assets/images/county/02.png" width="22" alt="">
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/02.png" width="20" alt=""><span class="ms-2">Catalan</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/03.png" width="20" alt=""><span class="ms-2">French</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/04.png" width="20" alt=""><span class="ms-2">Belize</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/05.png" width="20" alt=""><span class="ms-2">Colombia</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/06.png" width="20" alt=""><span class="ms-2">Spanish</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/07.png" width="20" alt=""><span class="ms-2">Georgian</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/08.png" width="20" alt=""><span class="ms-2">Hindi</span></a>
          </li>
        </ul>
      </li> --}}

      {{-- <li class="nav-item dropdown position-static d-md-flex d-none">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
        data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">done_all</i></a>
        <div class="dropdown-menu dropdown-menu-end mega-menu shadow-lg p-4 p-lg-5">
          <div class="mega-menu-widgets">
           <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 g-lg-5">
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <div class="mega-menu-icon flex-shrink-0 bg-danger">
                        <i class="material-icons-outlined">question_answer</i>
                      </div>
                      <div class="mega-menu-content">
                         <h5>Marketing</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/02.png" width="40" alt="">
                      <div class="mega-menu-content">
                         <h5>Website</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/03.png" width="40" alt="">
                      <div class="mega-menu-content">
                          <h5>Subscribers</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/01.png" width="40" alt="">
                      <div class="mega-menu-content">
                         <h5>Hubspot</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/11.png" width="40" alt="">
                      <div class="mega-menu-content">
                         <h5>Templates</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/13.png" width="40" alt="">
                      <div class="mega-menu-content">
                         <h5>Ebooks</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/12.png" width="40" alt="">
                      <div class="mega-menu-content">
                         <h5>Sales</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/08.png" width="40" alt="">
                      <div class="mega-menu-content">
                         <h5>Tools</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-4 shadow-none border mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                      <img src="assets/images/megaIcons/09.png" width="40" alt="">
                      <div class="mega-menu-content">
                         <h5>Academy</h5>
                         <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                           the visual form of a document.</p>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
           </div><!--end row-->
          </div>
        </div>
      </li> --}}
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
          data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
        <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
          <div class="border rounded-4 overflow-hidden">
            <div class="row row-cols-3 g-0 border-bottom">
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/01.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Gmail</p>
                  </div>
                </div>
              </div>
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/02.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Skype</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/03.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Slack</p>
                  </div>
                </div>
              </div>
            </div><!--end row-->

            <div class="row row-cols-3 g-0 border-bottom">
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/04.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">YouTube</p>
                  </div>
                </div>
              </div>
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/05.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Google</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/06.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Instagram</p>
                  </div>
                </div>
              </div>
            </div><!--end row-->

            <div class="row row-cols-3 g-0 border-bottom">
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/07.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Spotify</p>
                  </div>
                </div>
              </div>
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/08.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Yahoo</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/09.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Facebook</p>
                  </div>
                </div>
              </div>
            </div><!--end row-->

            <div class="row row-cols-3 g-0">
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/10.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Figma</p>
                  </div>
                </div>
              </div>
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/11.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Paypal</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-icon">
                    <img src="assets/images/apps/12.png" width="36" alt="">
                  </div>
                  <div class="app-name">
                    <p class="mb-0">Photo</p>
                  </div>
                </div>
              </div>
            </div><!--end row-->
          </div>
        </div>
      </li> --}}
      <li class="nav-item dropdown">
        {{-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
          data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
          <span id="notif-count" class="badge-notify">2</span>
        </a>
        <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
          <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
            <h5 class="notiy-title mb-0">Notifications Orders</h5>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-outlined">
                  more_vert
                </span>
              </button>
              <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                      class="material-icons-outlined fs-6">inventory_2</i>Archive All</a></div>
                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                      class="material-icons-outlined fs-6">done_all</i>Mark all as read</a></div>
                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                      class="material-icons-outlined fs-6">mic_off</i>Disable Notifications</a></div>
                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                      class="material-icons-outlined fs-6">grade</i>What's new ?</a></div>
                <div>
                  <hr class="dropdown-divider">
                </div>
                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                      class="material-icons-outlined fs-6">leaderboard</i>Reports</a></div>
              </div>
            </div>
          </div> --}}

          <div id="notif-list" class="notify-list">
              <div>
                  {{-- <a class="dropdown-item border-bottom py-2" href="javascript:;">
                    @foreach ($orders as $item)
                        <div class="d-flex align-items-center gap-3">
                          <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                              <span>{{ $item['kode_pemesanan'] }}</span>
                          </div>
                          <div>
                              <h5 class="notify-title"> {{ $item['status'] }} - Order</h5>
                          </div>
                          <div class="notify-close position-absolute end-0 me-3">
                              <i class="material-icons-outlined fs-6">close</i>
                          </div>
                      </div>
                    @endforeach
                      
                  </a> --}}
              </div>
          </div>

          <div id="notif-list" class="notify-list">
              {{-- <div>
                  <a class="dropdown-item border-bottom py-2" href="javascript:;">
                      ...
                  </a>
              </div> --}}
          </div>

          {{-- end pesan --}}

        </div>
      </li>
      
      {{-- modal absen --}}
      {{-- <li class="nav-item d-flex">
          <a class="nav-link position-relative btn" data-bs-toggle="modal" data-bs-target="#FormModal">
              <i class="material-icons-outlined">access_alarm</i>
          </a>
      </li> --}}
    

      <li class="nav-item dropdown">
        <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
           <img src="{{ !empty(session('user')['avatar']) ? session('user')['avatar'] : asset('vertical/assets/images/avatars/11.png') }}" class="rounded-circle p-1 border" width="45" height="45" alt="">
        </a>
        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
          <a class="dropdown-item  gap-2 py-2" href="/profile">
            <div class="text-center">
              <img src="{{ !empty(session('user')['avatar']) ? session('user')['avatar'] : asset('vertical/assets/images/avatars/11.png') }}" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                alt="">
              <h5 class="user-name mb-0 fw-bold">Hello, </h5>
            </div>
          </a>
          <hr class="dropdown-divider">
          <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
            class="material-icons-outlined">person_outline</i>Profile</a>
          @if (auth()->user()->is_admin)
          <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="/company"><i
            class="material-icons-outlined">account_balance</i>Company</a>
          @endif
          <hr class="dropdown-divider">
          <form action="/logout" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2 border-0 bg-transparent" style="cursor: pointer;">
                  <i class="material-icons-outlined">power_settings_new</i>Logout
              </button>
          </form>

        </div>
      </li>
    </ul>

  </nav>
</header>

<div class="modal fade" id="FormModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0 py-2 bg-grd-info">
        <h5 class="modal-title">Form Absensi</h5>
        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
          <i class="material-icons-outlined">close</i>
        </a>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <div class="text-center my-2">
            <h4 id="jamSekarang" style="font-weight: bold;"></h4>
          </div>
          
          <form id="absensiForm" class="row g-3">
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
          
            <div class="col-md-12">
              <label for="absenType" class="form-label">Absen</label>
              <select id="absenType" name="tipe_absen" class="form-select">
                <option value="in">Clock In</option>
                <option value="out">Clock Out</option>
              </select>
            </div>
          
            <div class="col-md-12 d-md-flex d-grid align-items-center gap-3">
              <button type="submit" class="btn btn-grd-danger px-4">Submit</button>
              <button type="reset" class="btn btn-grd-info px-4">Reset</button>
            </div>
          </form>
          

        </div>
      </div>
    </div>
  </div>
</div>