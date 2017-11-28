<nav class="navbar navbar-default navbar-static-top hidden-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand @if (!Auth::guest()) visible-xs @endif" href="#">Brand Logo</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if (!Auth::guest())
            <ul class="nav navbar-nav">

            </ul>
            <form action="{{ url('') }}" class="navbar-form navbar-left hidden-xs">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="s" @if(isset($s)) value="{{ $s }}" @endif/>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </form>
            @endif
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{trans('lang.menu.'.Session::get('locale'))}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Session::get('locale') != 'vi')<li><a href="{{ url('/language/vi') }}">{{trans('lang.menu.vi')}}</a></li>@endif
                        @if(Session::get('locale') != 'en')<li><a href="{{ url('/language/en') }}">{{trans('lang.menu.en')}}</a></li>@endif
                    </ul>
                </li>
                @if (Auth::guest())
                <li><a href="{{ url('/auth/login') }}">Login</a></li>
                <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/me') }}">Account</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#changePassword">{{trans('lang.menu.change.password')}}</a></li>
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<form action="{{ url('') }}" class="navbar-form visible-xs">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="s" @if(isset($s)) value="{{ $s }}" @endif/>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
    </div><!-- /input-group -->
</form>