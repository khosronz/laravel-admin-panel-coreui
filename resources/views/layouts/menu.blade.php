
<li class="nav-item {{ Request::is('organizations*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('organizations.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Organizations')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('roles.index') !!}">
        <i class="nav-icon icon-people"></i>
        <span>@lang('Roles')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('categories.index') !!}">
        <i class="nav-icon icon-folder"></i>
        <span>@lang('Categories')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('tickets*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('tickets.index') !!}">
        <i class="nav-icon cui-notes"></i>
        <span>@lang('Tickets')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('messages*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('messages.index') !!}">
        <i class="nav-icon cui-paper-plane"></i>
        <span>@lang('Messages')</span>
    </a>
</li>
