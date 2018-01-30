<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;
    protected $table = 'grades';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cuantitative', 'participation', 'punctuality', 'working_disposition', 'homework', 'comments', 'partial'
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

    public function myGroup() {
        return $this->belongsTo('App\Model\Group');
    }

    public function teacher() {
        return $this->belongsTo('App\Model\User');
    }

    public function partial() {
        return $this->belongsTo('App\Model\Partial');
    }
}
