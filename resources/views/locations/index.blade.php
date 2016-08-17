@extends('layouts.app')

@section('content')
    <div class="container">
    <h2>Locations</h2>

    @if ( !$locations->count() )
        You have no locations.
    @else
        <div class="row hide-mobile">
            @foreach( $locations as $location )
                <a href="{{ route('locations.show', ['slug' => $location->slug]) }}" class="on-hover">
                    <div class="col-md-4 margin-bottom-2">
                        <div class="col-md-12 well text-center thumbnail locations-grid" style="background-image: url('{{ URL::to('src/img/' . $location->name  . '/picture1.jpg') }}');">
                            <div class="caption">
                                <h4>{{ $location->name }}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="row show-mobile">
            @foreach( $locations as $location )
                <a href="{{ route('locations.show', ['slug' => $location->slug]) }}" class="on-hover">
                    <div class="margin-bottom-2 col-md-12 well text-center thumbnail locations-grid" style="background-image: url('{{ URL::to('src/img/' . $location->name  . '/picture1.jpg') }}');">
                        <div class="caption">
                            <h4><b>{{ $location->name }}</b></h4>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    @endif
    </div>
     <div class="push"></div>
@endsection