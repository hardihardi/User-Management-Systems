@extends('auth.template')

@section('title','Masuk')

@section('content')
  
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12">
      <div class="card o-hidden border-0 border-bottom-primary shadow-lg my-5">
        <div class="card-body p-0">

          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Masuk Sekarang!</h1>
                </div>

                <form class="user" action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email...">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Ingatkan Saya</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-facebook btn-user btn-block">
                    Masuk
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Lupa Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="{{ route('register') }}">Buat akun sekarang!</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>   

@endsection