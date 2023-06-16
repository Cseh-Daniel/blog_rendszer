<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

   /* public function posts()
    {

        return $this->hasMany(Post::class);
    }*/

    public function posts()
    {

        return $this->belongsToMany(Post::class,"label_posts");
    }

    /*    public function whereName($name)
    {

        return Label::where('name', $name)->first();
    }
    */
}
