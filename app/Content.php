<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['contentable_id','contentable_type'];

    public function activity(){
        return $this->belongsToMany(Activity::class);
    }

    public function contentable(){
        return $this->morphTo();
    }
}
