@extends('ui.layouts.app')
@section('title', 'Home')

@section('content')
<div class="player-details">
    <h2>{{ $player->player_name }}</h2>
    <img src="{{ asset('/css/ui/images/'.$player->player_photo)}}" alt="{{ $player->player_name }} Photo">

    <p><strong>Nationality:</strong> {{ $player->nationality }}</p>
    <p><strong>Team:</strong> {{ $player->team->team_name }}</p>
    <p><strong>Position:</strong> {{ $player->position }}</p>
    <p><strong>Birthday:</strong> {{ $player->birthday }}</p>
    <p><strong>Biography:</strong> {{ $player->biography }}</p>
    <p><strong>Club Number:</strong> {{ $player->club_number }}</p>
    <p><strong>Goals:</strong> {{ $player->goals }}</p>
    <p><strong>Assists:</strong> {{ $player->assists }}</p>
    <p><strong>Clean Sheets:</strong> {{ $player->clean_sheets }}</p>
@endsection
