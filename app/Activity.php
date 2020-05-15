<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function contents(){
        return $this->belongsToMany(Content::class);
    }
    public function unit(){
        return $this->belongsToMany(Unit::Class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function activityAttempt(){
        return $this->hasMany(ActivityAttempt::class);
    }    
}
