@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Данные по всем юзерам</div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Логин</th>
                                <th>Статус</th>
                                <th>Телефон</th>
                                <th>E-mail</th>
                                <th>День рождения</th>
                                <th>Краткая информация</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($users && $users->count() > 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->login}}</td>
                                            @if($user->status === 1)
                                                <td style="color: green">Активный</td>
                                            @else
                                                <td style="color: red">Удален</td>
                                            @endif
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->birthday}}</td>
                                            <td>{{$user->about}}</td>
                                            <td>
                                                <a @if($user->status === 1) href="cabinet/delete/{{$user->id}}" @else disabled @endif class="btn btn-danger delete-card-my-address btn-class-text">Удалить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
