<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
    {{ config('app.name') }}
    <div class="sidebar-brand-text mx-3"></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Divider -->
  <hr class="sidebar-divider">
  {{-- query --}}
  @php
    $menu = DB::select('select * from menu');
  @endphp
  {{-- end --}}

  <!-- Heading -->
  @foreach ($menu as $item)
    @php
    $menuID = $item->id;
      $submenu = DB::select("SELECT * FROM `submenu` 
                JOIN `menu` ON `submenu`.`menu_id` 
                = `menu`.`id` WHERE `submenu`.`menu_id`= $item->id
                AND `submenu`.`is_active` = 1");
    @endphp
    <div class="sidebar-heading">
      {{ $item->menu }}
    </div>
    @foreach ($submenu as $sub)
    <!-- Nav Item - Tables -->
    <li class="nav-item active">
      <a class="nav-link" href="{{ route($sub->url) }}">
        <i class="{{ $sub->icon }} fa-fw"></i>
        <span>{{ $sub->judul }}</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-1">
    @endforeach
  @endforeach

  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->