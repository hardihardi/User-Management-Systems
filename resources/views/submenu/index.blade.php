@extends('layouts.app')

@section('title','Submenu Management')

@section('content')
<div class="container-fluid">

  <!-- Page Heading --> 
  <div class="row">
    <div class="col-lg-12">
      <h1 class="h3 mb-0 text-gray-800">Submenu Management</h1>
      <div class="text-right">
        <a href="{{ route('submenu.create') }}" class="btn btn-primary mb-2">Tambah</a>
      </div>

      {{-- alert --}}
      <x-alert></x-alert>

    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Submenu Management</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Menu</th>
                  <th>Judul</th>
                  <th>Slug</th>
                  <th>URL</th>
                  <th>Ikon</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
                <tbody>
                  @foreach ($submenu as $sub)  
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sub->menu->menu }}</td>
                    <td>{{ $sub->judul }}</td>
                    <td>{{ $sub->slug }}</td>
                    <td>{{ $sub->url }}</td>
                    <td>{{ $sub->icon }}</td>
                    <td>{{ $sub->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td width="16%">
                      <a href="{{ route('submenu.edit', $sub->slug) }}" class="btn btn-primary">Edit</a>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteSubmenu-{{$sub->slug}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          <div class="float-right">
            {{ $submenu->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal Delete Data -->
@foreach ($submenu as $sub)
<div class="modal fade px-5" id="deleteSubmenu-{{$sub->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Submenu <strong>{{ $sub->judul }}</strong>.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">Anda yakin benar-benar ingin menghapus data ini?</p>
        <form action="{{ route('submenu.destroy', $sub->slug) }}" method="post">
          @csrf
          @method('DELETE')
          <div class="mt-3 text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning"><i class="fas fa-trash-alt"></i> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection