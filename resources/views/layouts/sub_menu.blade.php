@can('manage_admin_dashboard')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/dashboard*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/dashboard*') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">{{ __('messages.dashboard') }}</a>
    </li>
@endcan
