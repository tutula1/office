<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

	/**
	 * The database table used by the model.
	 */
	protected $table = 'permissions';
	
	/**
	 * The attributes that are mass assignable.
	 */
	protected $fillable = ['name', 'description', 'group'];
	
	/**
	 * Get the roles for the permission.
	 */
	public function roles()
	{
		return $this->belongsToMany('App\Role');
	}

}
