<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected  $guarded=[];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function likesCounter()
    {
        return $this->hasMany('App\Models\Like')->count();
    }

    public function getLikersNames()
    {
        $names = "";
        $likes = $this->hasMany('App\Models\Like')->get();
        foreach ($likes as $like){
            if($names == "")
                $names = User::where('id', $like->user_id)->first()->name;
            else
                $names = $names.", ".User::where('id', $like->user_id)->first()->name;
        }
        return $names;
    }
}
