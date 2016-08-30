<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partial extends Model
{
    use SoftDeletes;
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

    public function semester() {
        return $this->belongsTo('App\Model\Semester');
    }

    public function grades() {
        return $this->hasMany('App\Model\Grade');
    }
}
