<?php

namespace Creode\LaravelNovaEventsNestedCategories;

use Laravel\Nova\Nova;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelNovaEventsNestedCategoriesServiceProvider extends PackageServiceProvider
{

    public function boot()
    {
        parent::boot();
        $this->registerResources();
    }

    public function registerResources()
    {
        Nova::resources([
            \Creode\LaravelNovaEventsNestedCategories\Nova\Event::class,
            \Creode\LaravelNovaEventsNestedCategories\Nova\EventCategory::class,
        ]);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-nova-events-nested-categories')
            ->hasViews()
            ->hasRoutes('web')
            ->hasMigrations(
                [
                    '2023_08_23_130212_create_event_categories_table',
                    '2023_08_23_131350_create_events_table',
                    '2024_01_03_161950_rename_new_events_table_to_events',
                    '2024_01_03_162125_rename_new_event_categories_table_to_event_categories',
                ]
            )
            ->runsMigrations();
    }
}
