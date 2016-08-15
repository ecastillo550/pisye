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
	protected $dates = [
		'deleted_at'
	];

	public function teacher() {
		return $this->belongsTo('App\Model\User', 'user_id');
	}

	public function subject() {
		return $this->belongsTo('App\Model\Subject');
	}

	public function students() {
		return $this->belongsToMany('App\Model\Student', 'grade', 'class_id', 'student_id')->whereNull('grade.deleted_at')->withTimestamps()->withPivot('grade1', 'grade2');
	}
}
