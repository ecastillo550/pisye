<?php

namespace App;

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


    public function pisyeClass() {
    	return $this->belongsToMany('App\PisyeClass', 'grade', 'student_id', 'class_id')
        ->withPivot('grade1')
        ->withPivot('grade2')
        ->withPivot('final');
    }
}
