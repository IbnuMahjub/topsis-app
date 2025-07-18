@extends('layouts.main')
@section('content')
<div class="main-content">

  <!--start banner-->
  <section class="pt-2" id="home">
    <div class="container py-4 px-4 px-lg-0">
      <div class="row justify-content-center">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
          <div class="card rounded-4 mb-0 border-top border-4 border-primary border-gradient-1">
            <div class="card-body p-5">
               {{-- <img src="assets/images/logo1.png" class="mb-4 img-fluid" width="145" alt="Logo"> --}}
               <h4 class="fw-bold">Sign Up</h4>
               <p class="mb-0">Enter your information to create your account</p>

               <div class="form-body my-5">
                 <form class="row g-3" action="{{ route('register.storeRegister') }}" method="POST">
                  @csrf
                   <div class="col-12">
                     <label for="inputNameAddress" class="form-label @error('name') is-invalid @enderror">Name</label>
                     <input type="name" class="form-control " id="inputNameAddress" placeholder="Enter your name" name="name" value="{{ old('name') }}">
                     @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                   </div>
                   <div class="col-12">
                     <label for="inputEmailAddress" class="form-label @error('email') is-invalid @enderror">Email</label>
                     <input type="email" class="form-control " id="inputEmailAddress" placeholder="jhon@example.com" name="email" value="{{ old('email') }}">
                     @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                   </div>
                   <div class="col">
                    <label for="username" class="form-label @error('username') is-invalid @enderror">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                    </div>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                   </div>
                   <div class="col-12">
                     <label for="inputChoosePassword" class="form-label">Password</label>
                     <div class="input-group @error('password') is-invalid @enderror" id="show_hide_password">
                       <input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="password" value="{{ old('password') }}"> 
                       <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                     </div>
                     @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                   </div>
                   {{-- <div class="col-md-6 text-end"> 
                     <a href="/lupa-password">Forgot Password ?</a>
                   </div> --}}
                   <div class="col-12">
                     <div class="d-grid">
                       <button type="submit" class="btn btn-grd-primary">Register</button>
                     </div>
                   </div>
                   <div class="col-12">
                     <div class="text-start">
                       <p class="mb-0">already have an account? <a href="/">Sign here</a></p>
                     </div>
                   </div>
                 </form>
               </div>

           </div>
         </div>
        </div>
     </div><!--end row-->
    </div>
  </section>
  <!--end banner-->

</div>
@section('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          const togglePassword = document.querySelector('#show_hide_password a');
          const passwordInput = document.querySelector('#show_hide_password input');
          const icon = document.querySelector('#show_hide_password i');

          togglePassword.addEventListener('click', function (e) {
              e.preventDefault();
              if (passwordInput.type === "password") {
                  passwordInput.type = "text";
                  icon.classList.remove("bi-eye-slash-fill");
                  icon.classList.add("bi-eye-fill");
              } else {
                  passwordInput.type = "password";
                  icon.classList.remove("bi-eye-fill");
                  icon.classList.add("bi-eye-slash-fill");
              }
          });
      });
    </script>
@endsection
@endsection
