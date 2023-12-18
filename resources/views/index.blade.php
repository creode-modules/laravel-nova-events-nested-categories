@extends('nova-events-nested-categories::layouts.master')

@section('content')
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                @if($category->subCategories->count() > 0)
                    <ul>
                        @foreach($category->subCategories as $subCategory)
                            <li>{{ $subCategory->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
