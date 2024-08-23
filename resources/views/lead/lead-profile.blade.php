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
                <h2>{{ $lead->name }} {{ $lead->surname }}</h2>
                <form class="lead_form" id="lead_form_id" action="{{ route('lead.update', $lead->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="lead_group">
                        <input type="text" class="lead_input" name="name" placeholder="Ваше имя..." value="{{ $lead->name }}" required>
                        <input type="text" class="lead_input" name="surname" placeholder="Ваша фамилия..." value="{{ $lead->surname }}" required>
                    </div>
                    <div class="lead_group">
                        <input type="email" class="lead_input" name="email" placeholder="Ваша почта..." value="{{ $lead->email }}" required>
                        <div>
                            <label>+7</label>
                            <input type="number" class="lead_input" name="number" id="lead_number" placeholder="Ваш телефон..." value="{{ $lead->number }}" maxlength="10" required>
                        </div>
                    </div>
                    <textarea class="lead_textarea" name="message" placeholder="Текст сообщения..." cols="45" rows="10" required>{{ $lead->message }}</textarea>
                    <div class="lead_profile_footer">
                        <select class="multiple-select profile_select" name="status_id" id="status" data-lead-id="{{ $lead->id }}">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" data-color="{{ $status->color }}" {{ $lead->status_id === $status->id ? 'selected' : ''}}>
                                    {{ $status->type }}
                                </option>
                            @endforeach
                        </select>
                        <button class="update_form" type="submit" id="btn_update" disabled >Обновить</button>
                    </div>
                </form>
            </div>
            <div class="buttons_sing">
                <form action="{{ route('leadboard.delete', $lead->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="button_danger" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/lead-profile.js') }}"></script>
    <script src="{{ asset('js/button-state.js') }}"></script>
@endsection
