<?php

namespace Creode\LaravelNovaEventsNestedCategories\Entities;

use Illuminate\Database\Eloquent\Model;

class NewEventCategory extends Model
{

    protected $fillable = [];

    public function events()
    {
        return $this->hasMany(NewEvent::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(NewEventCategory::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(NewEventCategory::class, 'parent_id');
    }

}
