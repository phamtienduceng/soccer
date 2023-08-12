@extends('admin.layouts.app')

@section('title', 'Team ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Player</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Player</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
    <div class="card">
        <div class="row">

        <div class="col-sm-4">
    <div class="card-body">
        <form action="{{ route('admin.player.searchStat') }}" method="GET">
            <label for="">Search player: </label>
            <input type="text" name="search">
            <button type="submit">Search</button>
        </form>
    </div>
</div>
<div class="col-sm-4">
    <div class="card-body">
        
      <form action="{{ route('admin.player.sortStat') }}" method="POST">
        @csrf
        <label for="">Sort: </label>
        <select name="sort_by" onchange="this.form.submit()">
          <option value="">Sort by</option>
          <option value="name">Name</option>
          <option value="goals">Goals</option>
          <option value="assists">Assists</option>
        </select>
      </form>
    </div>
</div>
        </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Club</th>
                                <th>Position</th>
                                <th>Goal</th>
                                <th>Assists</th>
                                <th>Clean sheets</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($player as $tp)
                                <tr>
                                    <td>
                                        {{$tp->player_name}}
                                    </td>
                                    <td>
                                        @if($tp->player_photo != null)
                                            <img src="{{ asset('/css/ui/images/'.$tp->player_photo)}}" alt="" style="width:50px; height:auto;">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $tp->team->team_name }}
                                    </td>
                                    <td class="@if ($tp->position === 'Goalkeeper') text-yellow @elseif ($tp->position === 'Defend') text-blue @elseif ($tp->position === 'Middlefield') text-green @elseif ($tp->position === 'Striker') text-red @endif">
                                        {{ $tp->position }}
                                    </td>
                                    <td>
                                        {{$tp->goals}}
                                    </td>
                                    <td>
                                        {{$tp->assists}}
                                    </td>

                                    <td>
                                        {{$tp->clean_sheets}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


