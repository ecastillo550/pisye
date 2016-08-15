<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grades extends Model
{
    use SoftDeletes;
    protected $table = 'grade';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grade1', 'grade2', 'final'
    ];

    /**
    * The attributes that should be mutated to dates
    *
    * @var array
    */
    protected $dates = [
        'deleted_at'
    ];

    public function student() {
        return $this->belongsTo('App\Model\Student');
    }

    public function myclass() {
        return $this->belongsTo('App\Model\AClass');
    }
}
