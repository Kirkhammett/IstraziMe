@extends('layouts.app')

@section('content')
    <div class="container">
    <h2>Locations</h2>

    @if ( !$locations->count() )
        You have no locations.
    @else
        <div class="row">
            @foreach( $locations as $location )
                <div class="col-xs-2 col-md-4 text-center thumbnail locations-grid"
                     style="background-image: url('{{ URL::to('src/img/' . $location->name  . '/picture1.jpg') }}');">

                    <a href="{{ route('locations.show', ['slug' => $location->slug]) }}" class="on-hover">
                        <div class=" loc-box  ">

                        </div>
                    </a>
                </div>


            @endforeach
        </div>
    @endif
    </div>
@endsection