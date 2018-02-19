<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CualitativeGrade extends Model
{
    use SoftDeletes;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'order'
    ];

    protected $dates = [
        'deleted_at'
    ];
}
