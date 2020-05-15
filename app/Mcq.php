<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    protected $fillable = ['id'];
    
    public function content(){
        return $this->morphOne(Content::class,'contentable');
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function unit(){
        return $this->belogsTo(Unit::class);
    }

    public function creator(){
        return $this->belongsTo(User::class);
    }
    
}
