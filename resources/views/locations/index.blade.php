@extends('layouts.app')

@section('content')
    <div class="container">
    <h2>Locations</h2>

    @if ( !$locations->count() )
        You have no locations.
    @else
        <ul>
            @foreach( $locations as $location )
                <li><a href="{{ route('locations.show', ['slug' => $location->slug]) }}">{{ $location->name }}</a></li>
            @endforeach
        </ul>
    @endif
    </div>
@endsection