<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    use GenerateUniqueSlugTrait;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
    ];

    public function posts(): BelongsToMany
    {
        return $this->BelongsToMany(Post::class)->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
