@extends('.layout.index')
@section('content')
    <div class="back_to_main">
        <form action="{{ route('login.logout') }}" method="post">
            @csrf
            <a href="{{ route('login.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выйти</a>
        </form>
    </div>
    <div class="register">
        <form class="register-form" action="{{ route('verification.send') }}" method="post">
            @csrf
            <h1>Подтверждение почты</h1>
            @if(session('message'))
                <span style="color: orange">{{ session('message') }}</span>
            @endif
            <button type="submit">Выслать письмо</button>
        </form>
    </div>
@endsection
