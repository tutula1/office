<?php namespace App;

    use Illuminate\Auth\Authenticatable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Auth\Passwords\CanResetPassword;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

    class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

        use Authenticatable, CanResetPassword;

        /**
        * The database table used by the model.
        */
        protected $table = 'users';

        /**
        * The attributes that are mass assignable.
        */
        protected $fillable = ['role_id', 'name', 'email', 'password'];

        /**
        * The attributes excluded from the model's JSON form.
        */
        protected $hidden = ['password', 'remember_token'];

        /**
        * Get the role that owns the user.
        */
        public function role()
        {
            return $this->belongsTo('App\Role');
        }

        /**
        * Checking if user has permission.
        */
        public function hasPermission($action)
        {
            $permissionName = '';
            if (isset($action['as'])) {
                $permissionName =  $action['as'];
                $permissionName = str_replace(".show", '.index', $permissionName);
                $permissionName = str_replace(".store", '.create', $permissionName);
            } else {
                $permissionName =  $action['permission'];
            }
            if (strpos($action['controller'], '@update')) {
                $permissionName .= '.edit';
            }
            if ($permissionName == '') {
                return false;
            }
            if(\Session::get('expiresAt') == 0){
                \Cache::forget('permissions');
                $permissions = $this->role->permissions()->get();
            } else {
                if(\Cache::has('permissions')) {
                    $permissions = \Cache::get('permissions');
                } else {
                    $permissions = $this->role->permissions()->get();
                    \Cache::put('permissions', $permissions, \Session::get('expiresAt', 10));
                }
            }
            foreach ($permissions as $permission) {
                if ($permission->name == $permissionName) {
                    return true;
                }
            }
            return false;
        }

    }
