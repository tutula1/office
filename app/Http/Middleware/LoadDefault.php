<?php namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Contracts\Auth\Guard;
    use Session;

    class LoadDefault {

        /**
        * The Guard implementation.
        *
        * @var Guard
        */
        protected $auth;

        /**
        * Create a new filter instance.
        *
        * @param  Guard  $auth
        * @return void
        */
        public function __construct(Guard $auth)
        {
            $this->auth = $auth;
        }

        /**
        * Handle an incoming request.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \Closure  $next
        * @return mixed
        */
        public function handle($request, Closure $next)
        {
            if (!\Session::has('locale')) {
                \Session::put('locale', 'vi');
            }
            \App::setLocale(\Session::get('locale'));
            \Session::put('expiresAt', 0);
            $actions = [];
            $controllers = [];
            if ( $request->user()) {
                if(\Cache::has('permissions')) {
                    $permissions = \Cache::get('permissions');
                } else {
                    $permissions = $request->user()->role->permissions()->get();
                    \Cache::put('permissions', $permissions, \Session::get('expiresAt', 10));
                }
                foreach ($permissions as $permission) {
                    $actions[] = $permission->name;
                    if (!in_array($permission->group, $controllers)) {
                        $controllers[] = $permission->group;
                    }
                }
            }
            \Session::put('actions', '|'.join('|', $actions));
            \Session::put('controllers', '|'.join('|', $controllers));
            \Session::forget('breadcrumbs');
            return $next($request);
        }

    }
