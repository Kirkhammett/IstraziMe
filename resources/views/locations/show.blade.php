@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="envelop">
                <div class="breadcrumbs">
                    @for($i = 0; $i <= count(Request::segments()); $i++)

                    @if($i == 0 )
                    <li><a href="/">Дома</a></li>
                    @continue
                    @endif

                    @if($i == 1)
                    <li><a href="{{URL::to('/' . Request::segment($i)) }}"> Локалитети</a></li>
                    @continue
                    @endif

                    <li>
                      <a href="{{ URL::to('/locations/' . Request::segment($i)) }}">{{$location->name}}</a>
                  </li>

                  @endfor
              </div>
                <div id="carousel-example-generic"class="carousel slide " data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="">
                        <div class="item active">
                            <img src="{{ URL::to('/src/img/' . $location->slug ,'/1.jpg') }}" >
                        </div>
                        <div class="item">
                            <img src="{{ URL::to('/src/img/' . $location->slug ,'/2.jpg') }}" >
                        </div>
                        <div class="item">
                            <img src="{{ URL::to('/src/img/' . $location->slug ,'/3.jpg') }}" >
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row slider-caption">
                    <h4 class="h1 h-class text-center" style="padding-top: 15px">{{ $location->name }}</h4>
                    <hr class="hr-class">
                    <p class="slider-p"> <b>{{ $location->locality->loc_info }}</b>
                    </p>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="history">
                    <h3 class="text-center h-class" >Историја <hr class="hr-class2"></h3>
                    <p class="information-p information-p-mobile" style="color: white">
                    <b>{{$location->locality->loc_info}}</b>
                    </p>
                </div>
            </div>
        </div>

        <div class="row info-row">
            <div class="col-md-12">
                <div class="info-class info-class-mobile ">
                    <h3 class="text-center h-class">Информации</h3>
                    <h4 class="text-center h-class"> {{ $location->name }} </h4>
                    <hr class="hr-class2"></h3>
                    <p class="information-p " style="color: white" >
                        <b>{{$location->locality->loc_history}}</b>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
               <header><h3 class="text-center h-class">Локација</h3></header>
               <hr class="hr-class3">
               <div id="gmap"></div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-12">
              <header><h3 class="text-center h-class">Ценовник</h3></header>
              <hr class="hr-class3" >
              <div class="col-md-offset-2 col-sm-offset-2 col-lg-offset-2 col-md-10 col-lg-10 col-sm-10">
                 <div class="media">
                    <div class="media-left media-middle">
                        <img class="media-object" src="http://placehold.it/32x32" alt="...">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Стандардна цена:</h4>
                        <p>Стандардната цена за лица над 10 години е: <span class="badge">{{$location->locality->price}} денари. </span> </p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left media-middle">
                        <img class="media-object" src="http://placehold.it/32x32" alt="...">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Групна цена:</h4>
                        <p>Цена за група од 3 до 5 лица е: <span class="badge">{{$location->locality->price_group}} денари. </span> </p>
                    </div>
                </div> 
                <div class="media">
                    <div class="media-left media-middle">
                        <img class="media-object" src="http://placehold.it/32x32" alt="...">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Цена за деца:</h4>
                        <p>Цената за деца до 10 години е: <span class="badge">{{$location->locality->price_child}} денари. </span> </p>
                    </div>
                </div>         
               </div>
            </div>
        </div>
        <div style="height:50px;" id="comments"></div>
        @if(Session::has('message'))
            <div style="margin-top: 30px;" class="row">
                <div class="alert alert-success col-md-4 col-md-offset-4 text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{Session::get('message')}}
                </div>
            </div>
        @endif
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <header><h3 class="text-center h-class">Споделете ги вашите импресии </h3></header>
                <hr class="hr-class3" >
                <form action="{{ route('comment.create', ['loca_id' => $location->id])  }}#comments" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Ваш коментар.."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default">Испрати</button>
                    </div>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </section>

        <section class="row posts">
            <div class="col-md-6 col-md-offset-3 inner-kom">
                <header><h3 class="text-center h-class" style="color: #2C2C2C;">Коментари</h3></header>
                <hr class="hr-class3">
                <br>
                @if ( !$location->comments->count() )
                    <p class="text-center"> Оваа локација нема во моментов коментари. </p>
                    <br>
                    <br>
                @else
                    @foreach( $location->comments->sortByDesc('created_at') as $comment )
                        <article class="post" data-postid="{{ $comment->id }}">
                            <p class="comment-p">{{ $comment->commentBody  }}</p>
                            <div class="info a-klasa">
                                Од  <b>{{ $comment->users->name}} </b> на {{ date('F d, Y во h:m', strtotime($comment->created_at))}} 
                            </div>
                            <div class="interaction">
                                @if(Auth::user()->id == $comment->user_id)
                                    <a href="#" class="edit">Промени</a> |
                                    <a href="{{ route('comment.delete', ['comment_id' => $comment->id]) }}#comments">Избриши</a>
                                @endif
                            </div>
                        </article>
                    @endforeach
            </div>
        </section>
        @endif
    </div>
    <div class="push"></div>
    <script type="text/javascript" 
    src="http://maps.google.com/maps/api/js?key=AIzaSyCJOw22XT7GbQ5m5UfLRjPO_bu5fjSyUlA"></script>
    <script type="text/javascript"> 
    function initialize() 
    {

        var location = new google.maps.LatLng({{ $location->locality->lat }}, {{ $location->locality->long }});

        var params = {
         zoom: 16,
         center: location,
          mapTypeId: google.maps.MapTypeId.ROADMAP
         };

        var map = new google.maps.Map(document.getElementById("gmap"), params);

        var marker = new google.maps.Marker({
        position: location,
        map: map,
        });

        marker.setMap(map);
    }

  google.maps.event.addDomListener(window, 'load', initialize);

</script> 
@endsection
