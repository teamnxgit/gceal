<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function content(){
        return $this->morphOne(Content::class,'contentable');
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
