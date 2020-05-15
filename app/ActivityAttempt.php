<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityAttempt extends Model
{
    public function activity(){
        return $this->belongsTo(Activity::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function activityAttemptContents(){
        return $this->hasMany(ActivityAttemptContent::class);
    }
}
