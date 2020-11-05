<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function getCreaterName(){
        return User::find($this->user_id)->name;
    }
}
