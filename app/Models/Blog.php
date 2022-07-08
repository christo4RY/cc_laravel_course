<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $with = ['category', 'author'];

    protected $fillable = ['title', 'slug', 'intro', 'body'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search']??false, function ($query, $search) {
            $query->where(function ($query) use ($search){
                $query->where('title', 'Like', '%' . $search . '%')
                        ->orWhere('body', 'Like', '%' . $search . '%');
            });
        });

        $query->when($filter['category']??false, function ($query, $slug) {
            $query->whereHas('category',function($query) use ($slug){
                $query->where('slug',$slug);
            });
        });

        $query->when($filter['users']??false, function ($query, $username) {
            $query->whereHas('author',function($query) use ($username){
                $query->where('username',$username);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
