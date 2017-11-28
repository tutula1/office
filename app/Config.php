<?php namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Config extends Model {

        /**
        * The database table used by the model.
        */
        protected $table = 'configs';

        /**
        * The attributes that are mass assignable.
        */
        protected $fillable = ['key', 'value', 'user_id'];

        public function user()
        {
            return $this->belongsTo('App\User');
        }

    }
