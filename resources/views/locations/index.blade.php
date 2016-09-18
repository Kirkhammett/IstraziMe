@extends('layouts.app')

@section('content')
    <div class="container">
        <span class="breadcrumbs">
            @for($i = 0; $i <= count(Request::segments()); $i++)

            @if($i == 0 )
            <li><a href="/">Дома</a></li>
            @continue
            @endif

            @if($i == 1)
            <li><a href="{{URL::to('/' . Request::segment($i)) }}"> Локации</a></li>
            @continue
            @endif

            <li>
              <a href="{{ URL::to('/locations/' . Request::segment($i)) }}">{{$location->name}}</a>
          </li>

          @endfor
      </span>
        <div class="row" style="font-family: mountain-font">
            <div class="col-md-12 text-center">
                <h2>Локалитети</h2>
                <hr class="hr-class7">
                <br><br>
            </div>
        </div>

    @if ( !$locations->count() )
        You have no locations.
    @else
        <div class="row hide-mobile">
            @foreach( $locations as $location )
                <a href="{{ route('locations.show', ['slug' => $location->slug]) }}" class="on-hover">
                    <div class="col-md-4 margin-bottom-2">
                        <div class="col-md-12 well text-center thumbnail locations-grid" style="background-image: url('{{ URL::to('src/img/' . $location->slug  . '/picture1.jpg') }}');">
                            <div class="caption">
                                <h4 style="font-family: kenzoTange, sans-serif">{{ $location->name }}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="row show-mobile">
            @foreach( $locations as $location )
                <a href="{{ route('locations.show', ['slug' => $location->slug]) }}" class="on-hover">
                    <div class="margin-bottom-2 col-md-12 well text-center thumbnail locations-grid" style="background-image: url('{{ URL::to('src/img/' . $location->slug  . '/picture1.jpg') }}');">
                        <div class="caption">
                            <h4 style="font-family: kenzoTange, sans-serif"><b>{{ $location->name }}</b></h4>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    @endif
    </div>
     <div class="push"></div>
@endsection
