<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityAttemptContent extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function activityattempt(){
        return $this->belongsTo(ActivityAttempt::class);
    }
}
