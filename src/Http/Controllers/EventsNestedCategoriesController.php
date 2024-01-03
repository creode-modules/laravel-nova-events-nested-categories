<?php

namespace Creode\LaravelNovaEventsNestedCategories\Http\Controllers;

use Creode\LaravelNovaEventsNestedCategories\Entities\EventCategory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class EventsNestedCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $categories = EventCategory::has('subCategories')->with('subCategories.events')->get();
        return view('nova-events-nested-categories::index', compact('categories'));
    }

    public function show()
    {
        return view('nova-events-nested-categories::show');
    }
}
