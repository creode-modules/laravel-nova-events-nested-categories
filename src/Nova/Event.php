<?php

namespace Creode\LaravelNovaEventsNestedCategories\Nova;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \Creode\LaravelNovaEventsNestedCategories\Entities\Event::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
    ];

    public static $group = 'Events';

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),
            Slug::make('Slug')->from('Title'),
            Date::make('Start Date')
                ->sortable()
                ->rules('required', 'date')
                ->onlyOnForms(),
            Date::make('End Date')
                ->sortable()
                ->rules('date')
                ->onlyOnForms(),

            Stack::make('Dates', [
                Date::make('Start Date'),
                Date::make('End Date'),
            ]),

            Text::make('Venue'),
            Markdown::make('Address'),
            BelongsTo::make('Category', 'category', \Creode\LaravelNovaEventsNestedCategories\Nova\EventCategory::class)
                ->relatableQueryUsing(function (NovaRequest $request, Builder $query) {
                    return $query->where('parent_id', '!=', null);
                })
                ->dontReorderAssociatables()
                ->showCreateRelationButton()
                ->onlyOnForms(),

            Stack::make('Category', [ // This field in not shown on forms
                BelongsTo::make(
                    'Category',
                    'category',
                    \Creode\LaravelNovaEventsNestedCategories\Nova\EventCategory::class
                )
                    ->searchable()
                    ->withSubtitles(),

                Line::make('category-subtitle')->resolveUsing(function ($model) {
                    return $this->resource->category->parent->name;
                }),
            ]),

            URL::make('Button Link', 'cta_link')
                ->rules('required', 'url')
                ->onlyOnForms(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
