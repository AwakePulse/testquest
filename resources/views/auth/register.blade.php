@extends('.layout.index')
@section('content')
    <div class="back_to_main">
        <a href="{{ route('main_page') }}">Вернуться</a>
    </div>
    <div class="register">
        <form class="register-form" action="{{ route('register.store') }}" method="post">
            @csrf
            <h1>Регистрация</h1>
            <input class="{{ $errors->has('name') ? 'with_error' : 'without_error'}}" type="text" name="name" value="{{ old('name') }}" autofocus placeholder="name..." required/>
            @error('name')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <input class="{{ $errors->has('password') ? 'with_error' : 'without_error'}}" type="password" name="password" placeholder="password (min 8 characters)" required/>
            @error('password')
            <p style="color: red">{{ $message }}</p>
            @enderror
            <input class="{{ $errors->has('password_confirmation') ? 'with_error' : 'without_error'}}" type="password" name="password_confirmation" placeholder="confirm password..." required/>
            <input class="{{ $errors->has('email') ? 'with_error' : 'without_error'}}" type="email" name="email" value="{{ old('email') }}" placeholder="email address..." required/>
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <button type="submit">Создать</button>
            <span class="message">Уже зарегистрированы? <a href="{{ route('login') }}"><br>Sign In</a></span>
        </form>
    </div>
@endsection
