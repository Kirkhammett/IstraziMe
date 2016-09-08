@extends('layouts.app')

@section('content')
<div class=" landing container-fluid">

    <h1 class="title-landing"> Истражете ги убавините на Македонија </h1>
     <img src="{{URL::asset('/src/img/mak2.jpg')}}"height="600px" width="100%" class="slika-landing">
</div>
<div class="container-fluid informations">
<h3 style="color:whitesmoke;">Добредојдовте! </h3>
<p style="color:whitesmoke;text-align:justify-all">Сакате да откриете повеќе за вашата земја? Наша цел е да ви овозможиме детално запознавање со историјата на Македонија и нејзините археолошки локалитети. Дознајте повеќе информации и посетете некое ново место денес!
<br>
<br>
<button class="btn btn-primary btn-lg buton text-center"> Истражувај </button>
</div>
<br>
<h2 class="text-center">ПРЕПОРАКИ</h2>
<hr class="hr-class4">
<br>
<div classs="container">
<div class="col-md-4">
<img src="{{URL::asset('/src/img/navodnici2.png')}}"height="40px" width="40px">
<p class="p-imp"> So mesmerizing and unique, never have I thought I'd be so amazed by this wonderfull place.  </p>
<p class="p-imp2"> <i> Szymon Tuta </i> за <b> Стоби </b></p>
</div>
<div class="col-md-4">
<img src="{{URL::asset('/src/img/navodnici2.png')}}"height="40px" width="40px">
<p class="p-imp"> Surreal beauty and nature. Make sure to visit Kokino and bring your camera, you won't regret it trust me! </p>
<p class="p-imp2"> <i> Anna Maric </i> за <b> Кокино </b></p>
</div>
<div class="col-md-4">
<img src="{{URL::asset('/src/img/navodnici2.png')}}"height="40px" width="40px">
<p class="p-imp"> Macedonia has a such interesting history. It felt like a trip back to those ancient times..</p>
<p class="p-imp2"> <i> Stjepan P. </i> за <b> Хераклеја </b></p>
</div>
</div>
<br>
<br>
<br>
 <div class="push2"></div>
@endsection
