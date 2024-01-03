<?php

namespace Creode\LaravelNovaEventsNestedCategories\Entities;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{

    protected $fillable = [];

    public function events()
    {
        return $this->hasMany(Event::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(EventCategory::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(EventCategory::class, 'parent_id');
    }

}
