@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row" style="border-bottom: 1px solid grey;">
                <ul style="list-style-type:none; display:flex; padding-top:1%;">
                    <li class="active"><a style="text-decoration:none; color:black;"href="{{URL::to('/cards/add')}}">Додај</a></li>
                    <li style="padding:10px 10px;"><a style="text-decoration:none;"href="{{route('cards')}}">Измени</a></li>
                </ul>
            </div>
            <h3 style="font-weight:bold;">Додај нов производ:</h3>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="padding-top:3%; padding-bottom:9%;">
            <form action="{{URL::to('/cards')}}" method="post">
                @csrf
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @else
            <div class="alert alert-success">
                Продуктот е успешно додаден.
            </div>
            @endif

                <div class="form-group">
                    <label for="title">Име</label>
                      <input type="text" id="title" name="title" class="form-control">
                </div>
                    <div class="form-group">
                    <label for="subtitle">Поднаслов</label>
                      <input type="text" id="subtitle" name="subtitle"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Слика</label>
                        <input type="text" id="image" name="image" class="form-control" placeholder="http://">
                    </div>
                    <div class="form-group">
                        <label for="image">URL</label>
                        <input type="text" id="image" name="image" class="form-control" placeholder="http://">
                    </div>
                    <div class="form-group">
                        <label for="description">Опис</label>
                        <input type="text" id="description" name="description" class="form-control">
                    </div>
                      <div class="form-group">
                          <button class="btn btn-block" style="background-color:#fcd232; color:black;">Додај</button>
                      </div>
                      </form>
                  </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Вработи наши студенти</h4>
        <button type="button" class="close" id="myModalLabel" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="position:relative;top: -21px;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="info">
          <p style="color:#6c757d;">Внесете Ваши информации за да стапиме во контакт:</p>
        </div>
    <form action="{{URL::to('/companies')}}" method="post">
        @csrf

        <div class="form-group">
            <span style="background-color:#e3342f; color:white; display:block;">
                @if($errors->has('email'))
                    {{$errors->first('email')}}
                @endif
            </span>
            <label data-error="wrong" data-success="right" for="email">Е-мејл</label>
              <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
            <span style="background-color:#e3342f; color:white; display:block;">
                    @if($errors->has('number'))
                        {{$errors->first('number')}}
                    @endif
            </span>
            <label data-error="wrong" data-success="right" for="number">Телефон</label>
              <input type="text" id="number" name="number"class="form-control">
            </div>
            <div class="form-group">
            <span style="background-color:#e3342f; color:white; display:block;">
                    @if($errors->has('company'))
                        {{$errors->first('company')}}
                    @endif
            </span>
                <label data-error="wrong" data-success="right" for="company">Компанија</label>
                  <input type="text" id="company" name="company" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
              <div class="form-group">
                  <button class="btn btn-block" style="background-color:#fcd232; color:black;">Испрати</button>
                </div>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
