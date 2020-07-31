<!DOCTYPE html>
<html>
<head>
    <title>Brainster Labs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
@include('layouts.header')

@yield('content')

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
                  <button  class="btn btn-block"  id="buttonClick" style="background-color:#fcd232; color:black;">Испрати</button>

            </div>
            </form>
          </div>
    </div>
  </div>
</div>
@include('layouts.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
        <script>
$(document).ready(function(){
    $("#buttonClick").on("submit", function (event) {
        event.preventDefault();
            dataToSend = {
                email : $('#email').val(),
                phone: $('#phone').val(),
                company :$('#company').val()
            }
        $.ajax({
            url: "http://127.0.0.1:8000/",
            type: "POST",
            data: dataToSend,
            success: function (result) {
                console.log(result)
            }
        });
    })
});
        </script>
</body>
</html>
