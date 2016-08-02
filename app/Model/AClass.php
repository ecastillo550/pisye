<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AClass extends Model
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
    	return $this->hasOne('App\Model\User', 'user_id');
    }

    public function subject() {
        return $this->hasOne('App\Model\Subject', 'subject_id');
    }

    public function students() {
        return $this->belongsToMany('App\Model\Student', 'grade', 'class_id');
    }
}
