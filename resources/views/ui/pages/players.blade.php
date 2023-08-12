@extends('ui.layouts.app')
@section('title', 'Home')

@section('content')
<div class="site-section">
      <div class="container" style="margin-top: 50px">

<div class="row">

  <div class="col-sm-3 sidebar">
              <div class="card">
    <div class="card-body">


      <hr>

      <form action="{{ route('ui.sort') }}" method="POST">
        @csrf
        <label for="">Sort: </label>
        <select name="sort_by" onchange="this.form.submit()">
          <option value="">Sort by</option>
          <option value="name">Name</option>
          <option value="goals">Goals</option>
          <option value="assists">Assists</option>
        </select>
      </form>

      <hr>

      <form action="{{ route('ui.filter') }}" method="GET">
        @csrf
        <label for="">Filter</label>
        <ul>
          
          <li>
            <label>Club:</label>

            @foreach($team as $t)
            <ul>
              <li>           
                 <input type="checkbox" name="club[]" value="{{ $t->team_id }}"> {{ $t->team_name }}
</li>
            </ul>
            @endforeach
          </li>
          <li>
            <label>Position:</label>
            @foreach($positions as $position)
            <ul>
              <li><input type="checkbox" name="position[]" value="{{ $position }}"> {{ $position }}</li>
            </ul>
            
            @endforeach
          </li>
        </ul>
        <button type="submit">Filter</button>
      </form>

      
    </div>
    </div>
    </div>


  <div class="col-sm-9 content">
    <div class="row player-card">
      @foreach($players as $tp)
      <div class="col-4">
        <div class="card">
          <img src="{{ asset('/css/ui/images/'.$tp->player_photo)}}" alt="Player Image" class="card-img">
          <div class="card-body">
          <a class="card-text text-center" href="{{ Route('ui.detailPlayer', $tp->player_id) }}" style="color: brown; font-size: 25px; font-weight: 600">{{$tp->player_name}}</a>
          <p class="card-text text-center"><span><i class="fa-solid fa-house"></i></span> {{$tp->team->team_name}}</p>
          <p class="card-text text-center"><span><i class="fa-solid fa-location-dot"></i></span> {{$tp->position}}</p>



    <div class="d-flex justify-content-between">
        <p class="card-text"><span><i class="fa-regular fa-futbol"></i></span> {{$tp->goals}}</p>
        <p class="card-text"><span><i class="fa-solid fa-handshake-angle"></i></span> {{$tp->assists}}</p>
        <p class="card-text"><span><i class="fa-solid fa-mitten"></i></span> {{$tp->clean_sheets}}</p>
    </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
      </div>
    </div>
@endsection
