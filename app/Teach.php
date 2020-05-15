<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}