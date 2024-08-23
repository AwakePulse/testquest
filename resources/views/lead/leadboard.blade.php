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
    <div class="content">
        <div class="lead_content">
            <div class="lead_list">
                @if($leads->isEmpty())
                    <div class="is_empty">
                        <span>В настоящий момент лидов нет!</span>
                    </div>
                @endif
                @foreach($leads as $lead)
                    <div class="lead_item">
                        <div class="lead_item_info">
                            <div class="lead_id">
                                <span>id: {{ $lead->id }}</span>
                            </div>
                            <div class="lead_main_info">
                                <p>{{ $lead->name }}</p>
                                <p>{{ $lead->surname }}|</p>
                                <p>{{ $lead->email }}|</p>
                                <p>+7{{ $lead->number }}</p>
                            </div>
                            <div class="lead_create">
                                <span>{{ $lead->created_at }}</span>
                                <a href="{{ route('lead', $lead->id) }}">Открыть</a>
                            </div>
                        </div>
                        <div class="lead_buttons">
                            <form id="lead-form">
                                @csrf
                                <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
                                <select class="multiple-select" id="status" data-lead-id="{{ $lead->id }}">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" data-color="{{ $status->color }}" {{ $lead->status_id === $status->id ? 'selected' : ''}}>
                                            {{ $status->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                            <form action="{{ route('leadboard.delete', $lead->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"><img src="{{ asset('img/trash_icon.png') }}" alt="" style="width: 20px; height: 20px"></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="lead_total_info">
                <div class="lead_statuses">
                    <span class="status_new">{{ $leadNew }}</span>
                    <span class="status_at_work">{{ $leadAtWork }}</span>
                    <span class="status_completed">{{ $leadComplete }}</span>
                </div>
                <div>
                    <p>total: {{ $leadCount }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/change-status.js') }}"></script>
@endsection
