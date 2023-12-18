<?php

namespace Creode\LaravelNovaEventsNestedCategories\Entities;

use Illuminate\Database\Eloquent\Model;

class NewEvent extends Model
{

    protected $fillable = [];

    protected $casts = [
        'start_date' => 'date:d/m/Y',
        'end_date' => 'date:d/m/Y',
    ];

    public function category()
    {
        return $this->belongsTo(NewEventCategory::class, 'category_id', 'id');
    }

}
