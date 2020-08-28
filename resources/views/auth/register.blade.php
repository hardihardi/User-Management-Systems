@extends('auth.template')

@section('title','Daftar')

@section('content')
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12">

    <div class="card o-hidden border-bottom-primary border-0 shadow-lg my-5">
      <div class="card-body p-0">

        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
              </div>
              <form class="user" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama..." autofocus autocomplete="name">
                  @error('name')
                    <div class="invalid-feedback" role="alert">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email..." autocomplete="email">
                  @error('email')
                    <div class="invalid-feedback" role="alert">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" autocomplete="new-password">
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password_confirm" name="password_confirmation" placeholder="Repeat Password" autocomplete="new-password">
                  </div>
                </div>
                <button type="submit" class="btn btn-facebook btn-user btn-block">
                  Daftar
                </button>
              </form>
              <hr>
              <div class="text-center">
                <span>Sudah punya akun?</span>
                <a class="small" href="{{ route('login') }}"> Masuk Sekarang!</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection