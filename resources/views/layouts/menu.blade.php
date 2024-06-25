@can('manage_staff')
<li class="nav-item {{ Request::is('admin/guru*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('guru.index') }}">
        <span class="aside-menu-icon pe-3"><i class="fas fa-users"></i></span>
        <span class="aside-menu-title">Guru</span>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/murid*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('murid.index') }}">
        <span class="aside-menu-icon pe-3"><i class="fas fa-users"></i></span>
        <span class="aside-menu-title">Murid</span>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/pelajaran*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('pelajaran.index') }}">
        <span class="aside-menu-icon pe-3"><i class="fas fa-calendar-alt"></i></span>
        <span class="aside-menu-title">Mata Pelajaran</span>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/kelas*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('kelas.index') }}">
        <span class="aside-menu-icon pe-3"><i class="fas fa-hospital-user"></i></span>
        <span class="aside-menu-title">Kelas</span>
    </a>
</li>
@endcan

<li class="nav-item {{ Request::is('admin/nilai*') ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('nilai.index') }}">
        <span class="aside-menu-icon pe-3"><i class="fa-solid fa-graduation-cap"></i></span>
        <span class="aside-menu-title">Nilai</span>
    </a>
</li>