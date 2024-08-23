@extends('.layout.index')
@section('content')
    <div class="back_to_main">
        <a href="{{ route('main_page') }}">Вернуться</a>
    </div>
    <div class="register">
        <form class="register-form" action="{{ route('login.store') }}" method="post">
            @csrf
            <h1>Вход</h1>
            @if(session('status'))
                <span style="color: #3FC012">Вы успешно сменили пароль!</span>
            @endif
            <input class="{{ $errors->has('email') ? 'with_error' : 'without_error'}}" type="email" name="email" value="{{ old('email') }}" placeholder="email address..."/>
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <input class="{{ $errors->has('password') ? 'with_error' : 'without_error'}}" type="password" name="password" placeholder="password (min 8 characters)"/>
            @error('password')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <button type="submit">Войти</button>
            <span class="message">Нет аккаунта? <a href="{{ route('register.create') }}">Sign Up</a></span>
            <div class="message"><span>Забыли пароль? <a href="{{ route('password.request') }}">Reset</a></span></div>
        </form>
    </div>
@endsection
