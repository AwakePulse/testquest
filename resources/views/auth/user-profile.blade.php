@extends('layout.index')
@section('content')
    <nav class="navbar">
        <div class="navbar_menu">
            <ul>
                <li class="li_hh">
                    <h1><a href="{{ route('leadboard') }}">Laravel</a></h1>
                </li>
                <li>
                    <a href="{{ route('user.profile', auth()->user()->id) }}"><img src="{{ asset('img/profile_avatar.jpg') }}" alt="profile"></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="block-profile">
        <div>
            <div class="table_form">
                <h2>{{ $user->name }}</h2>
                <form class="lead_form" id="lead_form_id" action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="lead_group">
                        <input type="text" class="lead_input" name="name" placeholder="Ваше имя..." value="{{ $user->name }}" required>
                        <input type="text" class="lead_input" name="email" placeholder="Ваша фамилия..." value="{{ $user->email }}" required>
                    </div>
                    <div class="user_profile_footer">
                        <span><a href="{{ route('password.request') }}">Сменить пароль</a></span>
                        <button class="update_form" type="submit" id="btn_update" disabled >Обновить</button>
                    </div>
                </form>
            </div>
            <div class="buttons_sing">
                <form action="{{ route('login.logout') }}" method="post">
                    @csrf
                    <button class="button_danger" type="submit">Выход</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/lead-profile.js') }}"></script>
    <script src="{{ asset('js/button-state.js') }}"></script>
@endsection
