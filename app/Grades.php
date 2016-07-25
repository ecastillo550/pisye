<?php

namespace App;

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
    // protected $dates = [
    //     'date', 'publish_date', 'end_date', 'deleted_at'
    // ];
}
