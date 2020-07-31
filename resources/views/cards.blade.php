@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row" style="border-bottom: 1px solid grey;">
                <ul style="list-style-type:none; display:flex; padding-top:1%;">
                    <li style="padding:10px 10px;"><a style="text-decoration:none;"href="{{URL::to('/cards/add')}}">Додај</a></li>
                    <li class="active"><a style="text-decoration:none; color:black;"href="{{URL::to('/cards/edit')}}">Измени</a></li>
                </ul>
            </div>
            <h3 style="font-weight:bold;">Измени постоечки производи:</h3>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                @foreach($cards as $cards)
            <a href="{{URL::to('/cards')}}" class="cardsA">
                <div class="col-md-3 cards-style text-center">
                    <img src="{{$cards->image}}" alt="img" class="img-responsive" style="width:180px; height:120px;margin-left:2%;">
                    <h3 style="color:#6c757d;">{{$cards->title}}</h3>
                    <span style="color:#847592;">{{$cards->subtitle}}</span>
                    <p style="margin-top:6%;">{{$cards->description}}</p>
                    <div class="edit">
                        <button><a href="{{('cards/edit')}}/{{$cards->id}}"><i class="glyphicon glyphicon-pencil"></i></a></button>
                        <button><a href="{{('cards/delete')}}/{{$cards->id}}"><i class="glyphicon glyphicon-remove"></i></a></button>
                    </div>
                </div>
            </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
3
@endsection
