<?php

namespace Creode\LaravelNovaEventsNestedCategories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Creode\LaravelNovaEventsNestedCategories\Entities\NewEventCategory;

class EventsNestedCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
//        $categories = NewEventCategory::has('subCategories')->with('subCategories.events')->get();
        $categories = NewEventCategory::with('subCategories')
            ->whereHas('subCategories')
            ->get()
            ->transform(function ($category) {
                return [$category->name => $category->subCategories->pluck('name', 'id')];
            })
            ->groupBy('category.name')
            ->toArray();
//
//        $countries = Country::with('provinces')->get()->transform(function ($country) {
//            return [$country->name => $country->provinces->pluck('name', 'id')];
//        });

        return view('nova-events-nested-categories::index', compact('categories'));
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('nova-events-nested-categories::show');
    }
}
