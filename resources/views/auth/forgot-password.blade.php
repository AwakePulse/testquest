@extends('.layout.index')
@section('content')
    <div class="back_to_main">
        <a href="{{ route('login') }}">Вернуться</a>
    </div>
    <div class="register">
        <form class="register-form" action="{{ route('password.email') }}" method="post">
            @csrf
            <h1>Смена пароля</h1>
            <input class="{{ $errors->has('email') ? 'with_error' : 'without_error'}}" type="email" name="email" value="{{ old('email') }}" placeholder="email address..."/>
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <button type="submit">Отправить ссылку</button>
            @if(session('status'))
                <span style="color: #3FC012">Успешно!</span>
            @endif
        </form>
    </div>
@endsection
