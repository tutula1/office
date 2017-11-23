<?php namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Contracts\Auth\Guard;
    use Session;

    class CheckPermission {

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
            if ( ! $request->user()) {
                return redirect('auth/login');
            }
            $action = $request->route()->getAction();
            if (!isset($action['permission'])) {
                return redirect('error')->with('flash_message', 'You are not permission to view this page');
            }
            Session::put('action', $action);
            if ( ! $request->user() || ! $request->user()->hasPermission($action)) 
            {
                return redirect('error')->with('flash_message', 'You are not authorized to view this page');
            }
            return $next($request);
        }

    }
