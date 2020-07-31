@extends('layouts.master')
@section('content')

<div class="container-fluid col-md-4 col-md-offset-4" style="padding-top:10%; height:80vh">
    <div class="row">
        <form action="{{URL::to('/cards')}}" method="get">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="form-group">
            <label for="email">Е-мејл</label>
        <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Пасворд</label>
                  <input type="password" id="password" name="password"class="form-control">
            </div>
            <div class="form-group">
                    <button class="btn btn-block" style="background-color:#fcd232; color:black;">Логирај се</button>
            </div>
        </form>
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
            <label data-error="wrong" data-success="right" for="email">Е-мејл</label>
              <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
            <label data-error="wrong" data-success="right" for="number">Телефон</label>
              <input type="text" id="number" name="number"class="form-control">
            </div>
            <div class="form-group">
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
