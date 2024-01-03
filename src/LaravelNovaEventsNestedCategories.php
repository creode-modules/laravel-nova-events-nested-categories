<?php

namespace Creode\LaravelNovaEventsNestedCategories;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Tool;

class LaravelNovaEventsNestedCategories extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        return MenuSection::make('Laravel Nova Events Nested Categories')
            ->path('/laravel-nova-events-nested-categories')
            ->icon('server');
    }
}
