@extends('layouts.app')

@section('title','Edit Submenu')

@section('content')
<div class="container-fluid">

  <!-- Page Heading --> 
  <div class="row">
    <div class="col-lg-10 offset-lg-1">
      <h1 class="h3 mb-0 text-gray-800">Submenu Management</h1>
      <div class="text-right">
        <a href="{{ route('submenu.index') }}" class="btn btn-primary mb-2"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>

      {{-- alert --}}
      <x-alert></x-alert>

    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-10 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header px-5 py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Submenu</h6>
        </div>
        <div class="card-body px-5">
          <form action="{{ route('submenu.update', $submenu->slug) }}" method="post">
            @csrf
            @method('PUT')
            @include('submenu.partials.form')
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection