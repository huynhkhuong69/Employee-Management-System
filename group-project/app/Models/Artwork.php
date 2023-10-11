<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    
    protected $table = 'artwork';

    protected $fillable = [
        'title',
        'slug',
        'image_url',
        'description',
        'price',
        'is_for_sale',
        'is_ai_generated',
        'artist_name',
        'user_id',
        'category_id',
        ];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }

    }
}