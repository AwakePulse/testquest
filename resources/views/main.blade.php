@extends('layout.index')
@section('content')
    <div class="block">
        <div>
            <div class="welcome_text">
                <h1>Laravel</h1>
                <h3>Welcome to our site</h3>
            </div>
            <div class="table_form">
                <h2>User Form</h2>
                <form class="lead_form" action="{{ route('lead.store') }}" method="post">
                    @csrf
                    <div class="lead_group">
                        <input type="text" class="lead_input" name="name" placeholder="Ваше имя..." required>
                        <input type="text" class="lead_input" name="surname" placeholder="Ваша фамилия..." required>
                    </div>
                    <div class="lead_group">
                        <input type="email" class="lead_input" name="email" placeholder="Ваша почта..." required>
                        <div>
                            <label>+7</label>
                            <input type="number" class="lead_input" name="number" placeholder="Ваш телефон..." maxlength="10" required>
                        </div>
                    </div>
                    <textarea class="lead_textarea" name="message" placeholder="Текст сообщения..." cols="45" rows="10" required></textarea>
                    <input class="submit_form" type="submit" value="отправить" onclick="alert('отправлено')"/>
                </form>
            </div>
            <div class="buttons_sing">
                <a class="sing_in" href="{{ route('login') }}">Войти</a>
                <a class="sing_up" href="{{ route('register.create') }}">Регистрация</a>
            </div>
        </div>
    </div>
@endsection
