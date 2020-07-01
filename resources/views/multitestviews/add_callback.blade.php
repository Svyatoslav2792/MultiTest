@extends('multitestviews.index')
@section('content')
    <br>
    <div class="container">
        <div class="border" style="padding: 10px">
            <h3>Заказ звонка</h3>
            <hr>
        <form id="callbackAddForm" onsubmit="addCallback()" method="POST" enctype="multipart/form-data" action="javascript:void(null);">
            @csrf
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Номер телефона</label>
                <div class="col-sm-10">
                    <input  class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Имя</label>
                <div class="col-sm-10">
                    <input  class="form-control" id="name" name="name" placeholder="Введите имя">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Заказать звонок</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
