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
            $config = \App\Config::select('value')->where('key', 'expiresAt')->first();
            if(!$config){
                $expiresAt = 0;
            } else {
                $expiresAt = $config['value'];
            }
            \Session::put('expiresAt', $expiresAt);
            $actions = [];
            $controllers = [];
            $user_ids = [0];
            $user_id = 0;
            if ( $request->user()) {
                $user_ids[] = $request->user()->id;
                $user_id = $request->user()->id;
                if($expiresAt == 0){
                    \Cache::forget('permissions');
                    $permissions = $request->user()->role->permissions()->orderBy('group', 'ASC')->orderBy('name', 'ASC')->get();
                } else {
                    if(\Cache::has('permissions')) {
                        $permissions = \Cache::get('permissions');
                    } else {
                        $permissions = $request->user()->role->permissions()->orderBy('group', 'ASC')->orderBy('name', 'ASC')->get();
                        \Cache::put('permissions', $permissions, $expiresAt);
                    }
                }
                foreach ($permissions as $permission) {
                    $actions[] = $permission->name;
                    if (!in_array($permission->group, $controllers)) {
                        $controllers[] = $permission->group;
                    }
                }

            }
            if ($expiresAt != 0) {
                if(\Cache::has('defaultLanguage')) {
                    $config = \Cache::get('defaultLanguage');
                } else {
                    $config = \App\Config::select('value')->where('key', 'defaultLanguage')->where('user_id', $user_id)->first();
                    \Cache::put('defaultLanguage', $configs, $expiresAt);
                }
            } else { 
                \Cache::forget('defaultLanguage');
                $config = \App\Config::select('value')->where('key', 'defaultLanguage')->where('user_id', $user_id)->first();
            }
            if(!$config){
                $defaultLanguage = 'vi';
                \App\Config::create([
                    'key' => 'defaultLanguage',
                    'value' => 'vi',
                    'user_id' => $user_id
                ]);
            } else {
                $defaultLanguage = $config['value'];
            }
            \Session::put('locale', $defaultLanguage);
            \App::setLocale(\Session::get('locale'));
            if ($expiresAt != 0) {
                if(\Cache::has('configs')) {
                    $configs = \Cache::get('configs');
                } else {
                    $configs = \App\Config::select('key', 'value')->whereIn('user_id', $user_ids)->orderBy('user_id', 'DESC')->get();
                    \Cache::put('configs', $configs, $expiresAt);
                }
            } else {
                \Cache::forget('configs');
                $configs = \App\Config::select('key', 'value')->whereIn('user_id', $user_ids)->orderBy('user_id', 'DESC')->get();
            }
            \Session::put('configs', $configs);
            \Session::put('actions', $actions);
            \Session::put('controllers', $controllers);
            \Session::forget('breadcrumbs');
            return $next($request);
        }

    }
