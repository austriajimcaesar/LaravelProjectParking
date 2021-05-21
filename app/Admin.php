<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = ['title','description','user_id'];
    protected $guarded = ['img'];

    // relationship between user and posts
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship between comment and posts
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
