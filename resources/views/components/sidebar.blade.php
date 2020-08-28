<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

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
      <a class="nav-link" href="#">
        <i class="{{ $sub->icon }} fa-fw"></i>
        <span>{{ $sub->judul }}</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endforeach
  @endforeach

  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->