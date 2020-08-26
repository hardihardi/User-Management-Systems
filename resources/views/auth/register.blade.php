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
              <form class="user" action="" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan nama...">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('email') @enderror" name="email" id="email" placeholder="Masukkan email...">
                  @error('')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password_confirm" name="password_confirm" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-facebook btn-user btn-block">
                  Daftar
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Sudah punya akun? Masuk Sekarang!</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection