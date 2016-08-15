<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $table = 'subject';
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
        return $this->hasMany('App\Model\AClass', 'user_id');
    }
}
