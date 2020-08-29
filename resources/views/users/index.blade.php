@extends('layouts.app')

@section('title','Roles')

@section('content')
<div class="container-fluid">

  <!-- Page Heading --> 
  <div class="row mb-3">
    <div class="col-lg-8 offset-lg-2">
      <div class="text-center">
        <img src="https://source.unsplash.com/QAB-WJcbgJk/200x200" width="200" alt="image" class="rounded-circle shadow">
      </div>
      {{-- alert --}}
      <x-alert></x-alert>

    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-8 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <span class="text-gray-800 d-block mb-1">Nama Lengkap</span>
              <div class="alert shadow alert-light pl-1 border-left-primary" role="alert">
                {{ Auth::user()->name }}
              </div>
            </div>
            <div class="col-lg-6">
              <span class="text-gray-800 d-block mb-1">Alamat Email</span>
              <div class="alert shadow alert-light pl-1 border-left-primary" role="alert">
                {{ Auth::user()->email }}
              </div>
            </div>
            <div class="col-lg-6">
              <span class="text-gray-800 d-block mb-1">Mulai Bergabung</span>
              <div class="alert shadow alert-light pl-1 border-left-primary" role="alert">
                {{ Auth::user()->created_at }}
              </div>
            </div>
            <div class="col-lg-6 text-right mt-4">
              <a href="/dashboard" class="btn btn-link text-decoration-none"><i class="fas fa-arrow-left"></i> Kembali</a>
              <a href="#" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#editUser-{{ Auth::user()->id }}">Ubah Profil</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="editUser-{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title border-bottom-primary" id="exampleModalLabel">Ubah Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.update',Auth::user()) }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" placeholder="Masukkan nama.." autocomplete="name" autofocus required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" disabled class="form-control">
          </div>
          <div class="form-group">
            <label for="image">Photo </label>
            <input type="file" name="image" id="image" class="form-control form-control-file">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary px-4" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-primary px-4">Ubah</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection