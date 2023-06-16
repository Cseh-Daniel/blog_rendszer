<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "text",
        "user_id"/*,
        "label_id"*/
    ];

    /*
    public function label(){

        return $this->belongsTo(Label::class);

    }
*/
    public function labels()
    {

        return $this->belongsToMany(Label::class, 'label_posts');
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
