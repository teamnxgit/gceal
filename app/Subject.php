<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $incrementing = false;
    
    public function units(){
        return $this->hasMany(Unit::class);
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
    
}
