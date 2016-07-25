<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PisyeClass extends Model
{
    use SoftDeletes;
    protected $table = 'class';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
    * The attributes that should be mutated to dates
    *
    * @var array
    */
    // protected $dates = [
    //     'date', 'publish_date', 'end_date', 'deleted_at'
    // ];

    public function teacher() {
    	return $this->hasOne('App\User', 'user_id');
    }

    public function subject() {
        return $this->hasOne('App\Subject', 'subject_id');
    }

    public function student() {
        return $this->belongsTo('App\Student');
    }
}
