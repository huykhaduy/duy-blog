<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Post extends Model implements HasMedia
{
    use HasSlug, InteractsWithMedia, HasSEO;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'is_published',
        'is_featured',
        'sort_order',
        'user_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
            
        $this->addMediaCollection('gallery');
    }

    /**
     * Get the user that owns the post
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the categories for the post
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

     /**
     * Scope a query to only include published posts
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope a query to only include featured posts
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // latest
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeOfCategory($query, $category)
    {
        return $query->whereHas('categories', function($query) use ($category) {
            $query->where('id', $category);
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the post's thumbnail URL
     */
    public function getThumbnailUrlAttribute(): string
    {
        $media = $this->getMedia('thumbnail')->first();
        return $media ? $media->getUrl() : "https://www.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg";
    }

}
