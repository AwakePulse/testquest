@extends('.layout.index')
@section('content')
    <div class="back_to_main">
        <a href="{{ route('login') }}">Вернуться</a>
    </div>
    <div class="register">
        <form class="register-form" action="{{ route('password.update') }}" method="post">
            @csrf
            <h1>Новый пароль</h1>

            <input type="hidden" name="token" value="{{ $request->token }}">

            <input class="{{ $errors->has('email') ? 'with_error' : 'without_error'}}" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="email address..."/>
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <input class="{{ $errors->has('password') ? 'with_error' : 'without_error'}}" type="password" name="password" placeholder="password (min 8 characters)" required/>
            @error('password')
            <p style="color: red">{{ $message }}</p>
            @enderror
            <input class="{{ $errors->has('password_confirmation') ? 'with_error' : 'without_error'}}" type="password" name="password_confirmation" placeholder="confirm password..." required/>
            <button type="submit">Сменить пароль</button>
        </form>
    </div>
@endsection
