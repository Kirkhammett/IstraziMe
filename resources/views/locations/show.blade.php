@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row " >
            <div class="obikolka">
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
                            <img src="{{URL::to('src/img/Herakleja/herakleja1test.jpg')}}" alt="...">

                        </div>
                        <div class="item">
                            <img src="{{URL::to('src/img/Herakleja/herakleja2.jpg')}}"  alt="...">
                        </div>
                        <div class="item">
                            <img src="{{URL::to('src/img/Herakleja/herakleja3.jpg')}}"  alt="...">
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

                <div class="glaventekst row slider-caption">
                    <h4 class="h1 h-klasa text-center" style="padding-top: 15px">{{ $location->name }}</h4>
                    <hr class="hrklasa">
                    <p class="pozadina-p "> <b>Хераклеја Линкестис e градска населба од старомакедонско време до средниот век. Основана е кон средината на IV век пред н.е. од страна на кралот Филип II Македонски, како важен стратегиски пункт. Остатоците од материјалната култура од старомакедонската фаза на животот археолошки не се доволно истражени.

                            Хераклеја Линкестис се наоѓа на јужната периферија на градот Битола, во подножјето на планината Баба. Линкестис доаѓа од називот на регионот Линкестида во кој се наоѓал градот, а во кој живеело древното македонско племе Линкестиди. Сместена во плодна рамнина, од север заштитена од планината Баба, односно ридот Тумбе Кафе и реката Сива Вода на југ, Хераклеја опстојала и се развила во една значајна раскрсница на патот Виа Игнација (лат. Via Ignatia) кој ги поврзувал Драч и Босфор. Од Хераклеја патот дијагонално се протегал кон Стоби, а потоа кон Сердика - денешна Софија. </b>
                    </p>
                    <button class="btn kopce">Прочитај повеќе</button>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>


        <div class="row info-row">
            <div class="info-klasa">
                <h3 class="text-center h-klasa" >Информации</h3>
                <hr class="hrklasa2">
                <p class="informacii-p" style="color: white" >  <b> Доколку сте заинтересирани, локалитетот можете да го посетите секој ден од 08:00 до 16:00 часот. Влезницата за домашни туристи е 50 денари, за странски е 100 денари, а за деца 20 денари. За поголеми групни посети може да се обезбеди разгледување со туристички водич. </b> </p>

            </div>
            <iframe class="iframeklasa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12042.606023088756!2d21.333689669775406!3d41.01100029999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135724dc9718f1f5%3A0xf70c4a57038c2cf5!2sHeraclea+Lyncestis!5e0!3m2!1sen!2s!4v1470584013980" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>


        @if(Session::has('message'))
            <div class="row">
                <div class="alert alert-success col-md-4 col-md-offset-4 text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{Session::get('message')}}
                </div>
            </div>
        @endif
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <header><h3 class="text-center h-klasa">Споделете ги вашите импресии </h3></header>
                <hr class="hrklasa3" >
                <form action="{{ route('comment.create', ['loca_id' => $location->id])  }}" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Ваш коментар.."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default  ">Испрати</button>
                    </div>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </section>

        <section class="row posts">
            <div class="col-md-6 col-md-offset-3 inner-kom">
                <header><h3 class="text-center h-klasa" style="color: #2C2C2C">Коментари</h3></header>
                <hr class="hrklasa3">
                <br>
                @if ( !$location->comments->count() )
                    Оваа локација нема во моментов коментари.
                @else
                    @foreach( $location->comments->sortByDesc('created_at') as $comment )
                        <article class="post" data-postid="{{ $comment->id }}">
                            <p class="komentar-p">{{ $comment->commentBody  }}</p>
                            <div class="info a-klasa">
                                од корисник <b>{{ $comment->users->name}} </b> on {{ $comment->created_at }}
                            </div>
                            <div class="interaction">
                                @if(Auth::user()->id == $comment->user_id)
                                    <a href="#" class="edit">Промени</a> |
                                    <a href="{{ route('comment.delete', ['comment_id' => $comment->id]) }}">Избриши</a>
                                @endif
                            </div>
                        </article>
                    @endforeach
            </div>
        </section>
        @endif
    </div>

    <footer>
        <p class="text-center"> IstrazimeTeam &copy; 2016 | All Rights Reserved</p>
    </footer>


@endsection
