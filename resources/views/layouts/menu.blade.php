@php $styleCss = 'style' @endphp
<div class="no-record text-center d-none">{{ __('messages.no_matching_records_found') }}</div>
{{-- 
@can('manage_admin_dashboard')
    <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('admin.dashboard') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa fa-digital-tachograph"></i></span>
            <span class="aside-menu-title">{{ __('messages.dashboard') }}</span>
        </a>
    </li>
@endcan
--}}

@can('manage_staff')
    <li class="nav-item {{ Request::is('admin/pegawai*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('pegawai.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-users"></i></span>
            <span class="aside-menu-title">Pegawai</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/presensi*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('presensi.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-calendar-alt"></i></span>
            <span class="aside-menu-title">Presensi</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/izin*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('izin.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-procedures"></i></span>
            <span class="aside-menu-title">Izin</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/cuti*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('cuti.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-user-shield"></i></span>
            <span class="aside-menu-title">Cuti</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/murid*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('murid.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-users"></i></span>
            <span class="aside-menu-title">Murid</span>
        </a>
    </li>
@endcan