<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','slug','body','status'];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }  
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}