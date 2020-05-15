<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function teach(){
        return $this->hasOne(Teach::class);
    }

    public static function subjectName(){
        $user = User::find(Auth::user()->id);
        $userSubject = $user->teach()->first()->subject_id;
        $subjectName = Subject::find($userSubject)->title;
        return $subjectName;
    }

    public static function subjectId(){
        $user = User::find(Auth::user()->id);
        $userSubject = $user->teach()->first()->subject_id;
        return $userSubject;
    }

    public function rolerequest(){
        return $this->hasOne(RoleRequest::class);
    }
    public function enroll(){
        return $this->hasMany(Enroll::class);
    }

    public function mcqs(){
        return $this->hasMany(Mcq::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }
    public function activityAttempt(){
        return $this->hasMany(ActivityAttempt::class);
    }
}