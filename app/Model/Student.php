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

	protected $dates = [
        'deleted_at'
    ];


	public function classes() {
		return $this->belongsToMany('App\Model\AClass', 'grade', 'student_id', 'class_id')->whereNull('grade.deleted_at')->withTimestamps()->withPivot('grade1', 'grade2');
	}

	public function grades() {
		return $this->hasMany('App\Model\Grades');
	}
}
