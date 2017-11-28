<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <li data-toggle="collapse" data-target="#me" class="collapsed visible-xs">
                <a href="#"><i class="fa fa-user fa-lg"></i>{{trans('lang.menu.hello')}} {{ Auth::user()->name }} <span class="@if(Session::get('action')['permission'] == 'me') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'me') in @endif" id="me">
                <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'me.index') active @endif"><a href="{{ url('/me') }}">{{trans('lang.menu.account')}}</a></li>
                <li><a href="{{ url('/auth/logout') }}">{{trans('lang.menu.logout')}}</a></li>
            </ul>
            @if(in_array('Home', Session::get('controllers')))
            <li class="@if(isset(Session::get('action')['permission']) && Session::get('action')['permission'] == 'home') active @endif"><a href="{{ url('/') }}"><i class="fa fa-home fa-lg"></i>{{trans('lang.menu.home')}}</a></li>
            @endif
            @if(in_array('Jobs', Session::get('controllers')))
            <li data-toggle="collapse" data-target="#jobs" class="collapsed @if(Session::get('action')['permission'] == 'jobs') active @endif">
                <a href="#"><i class="fa fa-shield fa-lg"></i> {{trans('lang.menu.jobs')}} <span class="@if(Session::get('action')['permission'] == 'jobs') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'jobs') in @endif" id="jobs">
                @if(in_array('jobs.jobs.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'jobs.jobs.index') active @endif"><a href="{{ url('/jobs/jobs') }}">{{trans('lang.menu.jobs.jobs')}}</a></li>@endif
                @if(in_array('jobs.jobs.create', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'jobs.jobs.create') active @endif"><a href="{{ url('/jobs/jobs/create') }}">{{trans('lang.menu.jobs.jobs.create')}}</a></li>@endif
            </ul>
            @endif
            @if(in_array('Configs', Session::get('controllers')))
            <li data-toggle="collapse" data-target="#configs" class="collapsed @if(Session::get('action')['permission'] == 'configs') active @endif">
                <a href="#"><i class="fa fa-pencil fa-lg"></i> {{trans('lang.menu.configs')}} <span class="@if(Session::get('action')['permission'] == 'configs') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'configs') in @endif" id="configs">
                @if(in_array('configs.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'configs.index') active @endif"><a href="{{ url('/configs') }}">{{trans('lang.menu.configs')}}</a></li>@endif
                @if(in_array('configs.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'configs.create') active @endif"><a href="{{ url('/configs/create') }}"> {{trans('lang.menu.configs.create')}}</a></li>@endif
            </ul>
            @endif
            @if(in_array('Users', Session::get('controllers')))
            <li data-toggle="collapse" data-target="#users" class="collapsed @if(Session::get('action')['permission'] == 'users') active @endif">
                <a href="#"><i class="fa fa-users fa-lg"></i> {{trans('lang.menu.users')}} <span class="@if(Session::get('action')['permission'] == 'users') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'users') in @endif" id="users">
                @if(in_array('users.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'users.index') active @endif"><a href="{{ url('/users') }}">{{trans('lang.menu.users')}}</a></li>@endif
                @if(in_array('users.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'users.create') active @endif"><a href="{{ url('/users/create') }}"> {{trans('lang.menu.users.create')}}</a></li>@endif
            </ul>
            @endif
            @if(in_array('Roles', Session::get('controllers')))
            <li data-toggle="collapse" data-target="#roles" class="collapsed @if(Session::get('action')['permission'] == 'roles') active @endif">
                <a href="#"><i class="fa fa-object-group fa-lg"></i> {{trans('lang.menu.roles')}} <span class="@if(Session::get('action')['permission'] == 'roles') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'roles') in @endif" id="roles">
                @if(in_array('roles.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'roles.index') active @endif"><a href="{{ url('/roles') }}">{{trans('lang.menu.roles')}}</a></li>@endif
                @if(in_array('roles.create', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'roles.create') active @endif"><a href="{{ url('/roles/create') }}">{{trans('lang.menu.roles.create')}}</a></li>@endif
            </ul>
            @endif
            @if(in_array('Permissions', Session::get('controllers')))
            <li data-toggle="collapse" data-target="#permissions" class="collapsed @if(Session::get('action')['permission'] == 'permissions') active @endif">
                <a href="#"><i class="fa fa-shield fa-lg"></i> {{trans('lang.menu.permissions')}} <span class="@if(Session::get('action')['permission'] == 'permissions') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'permissions') in @endif" id="permissions">
                @if(in_array('permissions.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'permissions.index') active @endif"><a href="{{ url('/permissions') }}">{{trans('lang.menu.permissions')}}</a></li>@endif
                @if(in_array('permissions.create', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'permissions.create') active @endif"><a href="{{ url('/permissions/create') }}">{{trans('lang.menu.permissions.create')}}</a></li>@endif
            </ul>
            @endif
            @if(in_array('Languages', Session::get('controllers')))
            <li data-toggle="collapse" data-target="#languages" class="collapsed @if(Session::get('action')['permission'] == 'languages') active @endif">
                <a href="#"><i class="fa fa-language fa-lg"></i> {{trans('lang.menu.languages')}} <span class="@if(Session::get('action')['permission'] == 'languages') arrow-up @else arrow-down @endif"></span></a>
            </li>  
            <ul class="sub-menu collapse @if(Session::get('action')['permission'] == 'languages') in @endif" id="languages">
                @if(in_array('languages.index', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'languages.index') active @endif"><a href="{{ url('/languages') }}">{{trans('lang.menu.languages')}}</a></li>@endif
                @if(in_array('languages.create', Session::get('actions')))<li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'languages.create') active @endif"><a href="{{ url('/languages/create') }}">{{trans('lang.menu.languages.create')}}</a></li>@endif
            </ul>
            @endif
            @if(in_array('Cache', Session::get('controllers')))
            <li class="@if(isset(Session::get('action')['as']) && Session::get('action')['as'] == 'cache.index') active @endif"><a href="{{ url('cache') }}"><i class="fa fa-floppy-o fa-lg"></i>{{trans('lang.menu.cache')}}</a></li>
            @endif
        </ul>
    </div>
</div>