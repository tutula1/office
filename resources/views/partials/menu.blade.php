<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <li data-toggle="collapse" data-target="#me" class="collapsed visible-xs">
                <a href="#"><i class="fa fa-user fa-lg"></i>Hello {{ Auth::user()->name }} <span class="@if(Session::get('action')['permission'] == 'me') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'me') in @endif" id="me">
                <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'me.index') active @endif"><a href="{{ url('/me') }}">Account</a></li>
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            </ul>
            <li class="@if(isset(Session::get('action')['permission']) && Session::get('action')['permission'] == 'index') active @endif"><a href="{{ url('/') }}"><i class="fa fa-home fa-lg"></i>{{trans('lang.menu.home')}}</a></li>
            @if(strpos(Session::get('controllers'), '|Jobs') !== -1)
            <li data-toggle="collapse" data-target="#jobs" class="collapsed @if(Session::get('action')['permission'] == 'jobs') active @endif">
                <a href="#"><i class="fa fa-shield fa-lg"></i> {{trans('lang.menu.job')}} <span class="@if(Session::get('action')['permission'] == 'jobs') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'jobs') in @endif" id="jobs">
                @if(strpos(Session::get('actions'), '|jobs.index') !== -1)<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'jobs.index') active @endif"><a href="{{ url('/jobs') }}">Jobs</a></li>@endif
                @if(strpos(Session::get('actions'), '|jobs.create') !== -1)<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'jobs.create') active @endif"><a href="{{ url('/jobs/create') }}">Create Jobs</a></li>@endif
            </ul>
            @endif
            @if(strpos(Session::get('controllers'), '|Users') !== -1)
            <li data-toggle="collapse" data-target="#users" class="collapsed @if(Session::get('action')['permission'] == 'users') active @endif">
                <a href="#"><i class="fa fa-users fa-lg"></i> Users <span class="@if(Session::get('action')['permission'] == 'users') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'users') in @endif" id="users">
                @if(strpos(Session::get('actions'), '|users.index') !== -1)<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'users.index') active @endif"><a href="{{ url('/users') }}">Users</a></li>@endif
                @if(strpos(Session::get('actions'), '|users.create') !== -1)<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'users.create') active @endif"><a href="{{ url('/users/create') }}">Create Users</a></li>@endif
            </ul>
            @endif
            @if(strpos(Session::get('controllers'), '|Roles') !== -1)
            <li data-toggle="collapse" data-target="#roles" class="collapsed @if(Session::get('action')['permission'] == 'roles') active @endif">
                <a href="#"><i class="fa fa-object-group fa-lg"></i> {{trans('lang.menu.roles')}} <span class="@if(Session::get('action')['permission'] == 'roles') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'roles') in @endif" id="roles">
                @if(strpos(Session::get('actions'), '|roles.index') !== -1)<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'roles.index') active @endif"><a href="{{ url('/roles') }}">{{trans('lang.menu.roles')}}</a></li>@endif
                @if(strpos(Session::get('actions'), '|roles.create') !== -1)<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'roles.create') active @endif"><a href="{{ url('/roles/create') }}">{{trans('lang.menu.roles.create')}}</a></li>@endif
            </ul>
            @endif
            <li data-toggle="collapse" data-target="#permissions" class="collapsed @if(Session::get('action')['permission'] == 'permissions') active @endif">
                <a href="#"><i class="fa fa-shield fa-lg"></i> {{trans('lang.menu.permissions')}} <span class="@if(Session::get('action')['permission'] == 'permissions') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'permissions') in @endif" id="permissions">
                <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'permissions.index') active @endif"><a href="{{ url('/permissions') }}">{{trans('lang.menu.permissions')}}</a></li>
                <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'permissions.create') active @endif"><a href="{{ url('/permissions/create') }}">{{trans('lang.menu.permissions.create')}}</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#languages" class="collapsed @if(Session::get('action')['permission'] == 'languages') active @endif">
                <a href="#"><i class="fa fa-language fa-lg"></i> {{trans('lang.menu.languages')}} <span class="@if(Session::get('action')['permission'] == 'languages') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'languages') in @endif" id="languages">
                <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'languages.index') active @endif"><a href="{{ url('/languages') }}">{{trans('lang.menu.languages')}}</a></li>
                <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'languages.create') active @endif"><a href="{{ url('/languages/create') }}">{{trans('lang.menu.languages.create')}}</a></li>
            </ul>
            <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'cache.index') active @endif"><a href="{{ url('cache') }}"><i class="fa fa-floppy-o fa-lg"></i>{{trans('lang.menu.cache')}}</a></li>
        </ul>
    </div>
</div>