<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; // Import the Comment model
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'featured_image', 'category_id', 'content'];
   
    public function comments()
    {
        return $this->hasMany(Comment::class); // Define the relationship to the Comment model
    }
    
}
