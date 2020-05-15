<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function subject(){
        return $this->belogsTo(Subject::class);
    }
    public function mcq(){
        return $this->hasMany(Mcq::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function activities(){
        return $this->belongsToMany(Activity::class);
    }
}
