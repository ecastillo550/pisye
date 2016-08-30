<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
	use SoftDeletes;
	protected $table = 'students';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	protected $dates = [
        'deleted_at'
    ];


	public function classes() {
		return $this->belongsToMany('App\Model\AClass', 'student_class', 'student_id', 'class_id');
	}

	public function grades() {
		return $this->hasMany('App\Model\Grade');
	}
}
