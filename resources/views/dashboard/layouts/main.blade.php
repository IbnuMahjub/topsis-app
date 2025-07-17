<!doctype html>
{{-- <html lang="en" data-bs-theme="dark"> --}}
  <html lang="en" data-bs-theme="{{ session('theme', 'blue-theme') }}">



<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Algoritma Topsis | {{ $title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!--favicon-->
  <link rel="icon" href="{{ asset('/assets/images/topsisnobg.png') }}" type="image/png">
  <!-- loader-->
  <link href="{{ asset('vertical/assets/css/pace.min.css') }}" rel="stylesheet">
  <script src="{{ asset('vertical/assets/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link href="{{ asset('vertical/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/assets/plugins/metismenu/metisMenu.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/assets/plugins/metismenu/mm-vertical.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">

  <!-- SweetAlert CSS -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

   <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <!-- Link CSS untuk Routing Machine -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

  <!-- Link JS untuk Leaflet -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <!-- Link JS untuk Routing Machine -->
  <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>


  <!--bootstrap css-->
  <link href="{{ asset('vertical/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="{{ asset('vertical/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/sass/main.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/sass/dark-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/sass/blue-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/sass/semi-dark.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/sass/bordered-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/sass/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('vertical/assets/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
	<link href="{{ asset('vertical/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet">

  <style>

    .sidebar-nav {
        background-color: #f8f9fa; 
        padding: 10px;
    }

    .sidebar-nav a {
        color: inherit; 
        text-decoration: none;
        display: block;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .sidebar-nav a:hover {
        background-color: #e9ecef; 
        color: #000;
    }

    .sidebar-nav .metismenu .mm-active > a {
        background-color: #007bff;
        color: #fff; 
    }

    .sidebar-nav .metismenu .mm-show .active > a {
        background-color: #0056b3; /* Warna latar belakang sub-menu aktif */
        color: #fff; /* Warna teks sub-menu aktif */
    }

    .select2-container .select2-selection--single {
        height: calc(2.25rem + 2px); 
        padding-top: 0.375rem;
        padding-bottom: 0.375rem;
      }

      .select2-selection__rendered {
        line-height: 1.5;
      }

      .select2-container {
        font-size: 1rem; /* Sesuaikan dengan font-size default Bootstrap */
      }

      .select2-container .select2-selection--single .select2-selection__rendered {
        line-height: 1.5; 
      }

      .chat-bubble {
    max-width: 70%;
    padding: 10px 15px;
    border-radius: 15px;
    margin-bottom: 10px;
    position: relative;
    word-wrap: break-word;
  }

  .chat-bubble.sent {
    background-color: #d1e7dd;
    align-self: flex-end;
    border-bottom-right-radius: 0;
  }

  .chat-bubble.received {
    background-color: #f1f1f1;
    align-self: flex-start;
    border-bottom-left-radius: 0;
  }

  .chat-meta {
    font-size: 0.75rem;
    color: #888;
    margin-top: 5px;
    text-align: right;
  }

  #chatMessages {
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    height: 100%;
  }

  .avatar {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  </style>

</head>

<body>

  <!--start header-->
  @include('dashboard.layouts.header')
  <!--end top header-->

  <!--start sidebar-->
  <aside class="sidebar-wrapper" data-simplebar="true">
    @include('dashboard.layouts.sidebar')
  </aside>
  <!--end sidebar-->

  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">{{ $breadcrumbTitle ?? 'Default Title' }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        @foreach ($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item {{ isset($breadcrumb['active']) && $breadcrumb['active'] ? 'active' : '' }}">
                                <a href="{{ $breadcrumb['url'] }}">
                                    {{ $breadcrumb['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </nav>
            </div>
          <div class="ms-auto">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-primary">Settings</button>
              <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
              </div>
            </div>
          </div>
        </div>
        <!--end breadcrumb-->
     
        <div class="row">
          @yield('content')
        </div>
       
  <!--end cart-->



  <!--start switcher-->
  <button class="btn btn-grd btn-grd-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
    <i class="material-icons-outlined">tune</i>Customize
  </button>
  
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
    <div class="offcanvas-header border-bottom h-70">
      <div class="">
        <h5 class="mb-0">Theme Customizer</h5>
        <p class="mb-0">Customize your theme</p>
      </div>
      <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
        <i class="material-icons-outlined">close</i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div>
        <p>Theme variation</p>

        <div class="row g-3">
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" value="blue-theme">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="BlueTheme">
              <span class="material-icons-outlined">contactless</span>
              <span>Blue</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="LightTheme" value="light">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="LightTheme">
              <span class="material-icons-outlined">light_mode</span>
              <span>Light</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="DarkTheme" value="dark">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="DarkTheme">
              <span class="material-icons-outlined">dark_mode</span>
              <span>Dark</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme" value="semi-dark">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="SemiDarkTheme">
              <span class="material-icons-outlined">contrast</span>
              <span>Semi Dark</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme" value="bordered-theme">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="BoderedTheme">
              <span class="material-icons-outlined">border_style</span>
              <span>Bordered</span>
            </label>
          </div>
        </div><!--end row-->

      </div>
    </div>
  </div>
        
    </div>
  </main>
  <!--end main wrapper-->

  <!-- Load jQuery First -->
  <script src="{{ asset('vertical/assets/js/jquery.min.js') }}"></script>
  <!-- jQuery UI CSS -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <!-- jQuery UI JS -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>


  {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}

  <!-- Load Bootstrap JS -->
  <script src="{{ asset('vertical/assets/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="{{ asset('vertical/assets/plugins/select2/js/select2-custom.js') }}"></script>
  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.js"></script>

  <!--plugins-->
  <script src="{{ asset('vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vertical/assets/plugins/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('vertical/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
  <script src="{{ asset('vertical/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      new MetisMenu('#sidenav');
    });
  </script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
  <script src="{{ asset('vertical/assets/js/main.js') }}"></script>
  <script>
    new PerfectScrollbar(".user-list")
  </script>

  {{-- Data Table --}}
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>


  <script src="{{ asset('vertical/assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
	<script src="{{ asset('vertical/assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
	<script src="{{ asset('vertical/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
	<script src="{{ asset('vertical/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
	<script src="{{ asset('vertical/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>

  @yield('scripts')
</body>

</html>
