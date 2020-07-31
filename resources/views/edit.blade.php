@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row" style="border-bottom: 1px solid grey;">
                <ul style="list-style-type:none; display:flex; padding-top:1%;">
                    <li style="padding:15px 15px;"><a style="text-decoration:none;"href="{{URL::to('/cards/add')}}" >Додај</a></li>
                <li class="active"><a style="text-decoration:none; color:black;"href="{{URL::to('/edit')}}/{{$card->id}}">Измени</a></li>
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
                <div class="col-md-3 cards-styleSecond text-center">
                <form action="{{URL::to('/cards')}}/{{$card->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="image">URL</label>
                        <input type="text" name="image" class="form-control" id="image" value="{{$card->image}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Слика</label>
                        <input type="text" class="form-control" name="image" id="image" value="{{$card->image}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Име</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$card->title}}">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Поднаслов</label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{$card->subtitle}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Опис</label>
                        <textarea name="description" class="form-control" id="description" placeholder="{{$card->description}}">{{$card->description}}</textarea>
                    </div>
                    <div class="edit">
                        <button type="submit">Зачувај</button>
                    <button><a href="{{route('cards') }}">Откажи</a></button>
                    </div>
                </a>
                </form>
            </div>
                <div class="row">
                    @foreach($cards as $card)
                <a href="{{URL::to('cards')}}" class="cardsA">
                    <div class="col-md-12 cards-style text-center">
                        <img src="{{$card->image}}" alt="img" class="img-responsive" style="width:180px; height:120px;margin-left:2%;">
                        <h3 style="color:#6c757d;">{{$card->title}}</h3>
                        <span style="color:#847592;">{{$card->subtitle}}</span>
                        <p style="margin-top:6%;">{{$card->description}}</p>
                        <div class="edit">
                            <button><a href="{{$card->id}}"><i class="glyphicon glyphicon-pencil"></i></a></button>
                            <button><a href="{{$card->id}}"><i class="glyphicon glyphicon-remove"></i></a></button>
                        </div>
                    </div>
                </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

