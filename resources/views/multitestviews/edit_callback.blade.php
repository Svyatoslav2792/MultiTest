@extends('multitestviews.index')
@section('content')
    <br>
    <div class="container">
        <div class="border" style="padding: 10px">
            <h3 id="id">Изменение заявки № {{$data->id}}</h3>
            <hr>
        <form id="callbackEditForm" onsubmit="editCallback()" method="POST" enctype="multipart/form-data" action="javascript:void(null);">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Номер телефона</label>
                <div class="col-sm-10">
                    <input  class="form-control" id="phone" name="phone" value="{{$data->phone}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Имя</label>
                <div class="col-sm-10">
                    <input  class="form-control" id="name" name="name" value="{{$data->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
