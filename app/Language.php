<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {

	/**
     * The database table used by the model.
     */
    protected $table = 'languages';
    
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'vi', 'en', 'group'];

}
