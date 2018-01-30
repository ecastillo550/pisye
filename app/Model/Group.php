<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
	use SoftDeletes;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'level_id', 'semester_id'
	];

	/**
	* The attributes that should be mutated to dates
	*
	* @var array
	*/
	protected $dates = [
		'deleted_at'
	];

	public function level() {
		return $this->belongsTo('App\Model\Level');
	}

	public function teacher() {
		return $this->belongsToMany('App\Model\User', 'user_class', 'class_id', 'user_id');
	}

	public function subject() {
		return $this->belongsTo('App\Model\Subject');
	}

	public function semester() {
		return $this->belongsTo('App\Model\Semester');
	}

	public function students() {
		return $this->belongsToMany('App\Model\Student', 'student_class', 'class_id', 'student_id');
	}
}
