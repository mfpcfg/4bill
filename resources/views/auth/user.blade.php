@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if(!$user_status)
                        <div class="card-header" style="text-align: center">Этот пользователь был заблоĸирован!</div>
                    @else
                        <div class="card-header">Общие данные</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Логин</th>
                                    <th>Телефон</th>
                                    <th>E-mail</th>
                                    <th>День рождения</th>
                                    <th>Краткая информация</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @if($user)
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->login}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->birthday}}</td>
                                        <td>{{$user->about}}</td>
                                    @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
