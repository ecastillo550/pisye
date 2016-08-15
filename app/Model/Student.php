<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
	use SoftDeletes;
	protected $table = 'student';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];


	public function classes() {
		return $this->belongsToMany('App\Model\AClass', 'grade', 'student_id', 'class_id');
	}

	public function grades() {
		return $this->hasMany('App\Model\Grades');
	}
}
