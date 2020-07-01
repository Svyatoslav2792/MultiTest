@extends('multitestviews.index')
@section('content')
    <br>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Имя</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($callbacks as $callback)
                <tr>
                    <th scope="row">{{$callback->id}}</th>
                    <td>{{$callback->phone}}</td>
                    <td>{{$callback->name}}</td>
                    <td>{{$callback->cteated_at}}</td>
                    <td><a href="edit_callback/{{$callback->id}}">Редактировать </a>/
                        <a href="#" onclick="deleteCallback({{$callback->id}})">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$callbacks->links()}}
    </div>

@endsection

