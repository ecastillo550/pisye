<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Model\Group;

class User extends Authenticatable
{
    use SoftDeletes { restore as private restoreA; }
    use EntrustUserTrait { restore as private restoreB; }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    public function groups() {
        return $this->belongsToMany('App\Model\Group', 'group_teacher');
    }

    public function enrolled() {
        return $this->belongsToMany('App\Model\Group', 'group_student');
    }

    public function enrolledNormal() {
        return $this->belongsToMany('App\Model\Group', 'group_student')->join('subjects', 'groups.subject_id', 'subjects.id')->where('subjects.type', 1);
    }

    public function enrolledWorkshop() {
        return $this->belongsToMany('App\Model\Group', 'group_student')->join('subjects', 'groups.subject_id', 'subjects.id')->whereIn('subjects.type', [2, 3, 4]);
    }

    public function grades() {
        return $this->hasMany('App\Model\Grade', 'student_id');
    }

    public function level() {
        return $this->belongsTo('App\Model\Level');
    }
}
