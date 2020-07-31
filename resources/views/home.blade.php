@extends('layouts.master')

@section('content')

<div class="container-fluid firstBackground">
    <div class="row">
        <h1 style="font-size:60px;">Brainster.xyz Labs</h1>
        <h3 style="font-size:25px;">Проекти од академиите на Brainster</h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="padding-top:5%; padding-bottom:5%;">
            <div class="row">

                @foreach($cards as $card)
            <a href="{{URL::to('/admin')}}" class="cardsA">
                <div class="col-md-3 cards-style text-center">
                    <img src="{{$card->image}}" alt="img" class="img-responsive" style="width:180px; height:120px;margin-left:15%;">
                    <h3 style="color:#6c758d;">{{$card->title}}</h3>
                    <span style="color:#847592;">{{$card->subtitle}}</span>
                    <p style="margin-top:6%;">{{$card->description}}</p>
                </div>
            </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection
