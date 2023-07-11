<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'excerpt', 'body', 'category_id'];

    //cuando se hace el query se listan tambien los objetos del FK
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)//Posts::newQuery()->filter();
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'));

//        $query->when($filters['category'] ?? false, fn ($query, $category) =>
//            $query->whereExists(fn($query) =>
//                $query->from('categories', )
//                    ->whereColumn('categories.id', 'posts.category_id')
//                    ->where('categories.slug', $category)));

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author() //busca en la db el FK nombredelmetodo_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
