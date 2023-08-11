@extends('ui.layouts.app')
@section('title', 'Home')

@section('content')
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-6 title-section">
            <h2 class="heading">Players</h2>
          </div>
        </div>

		<div class="card text-center" style="margin-bottom: 30px; padding-top: -30px" >
				<div class="row">
					<div class="col-sm-4">
						<div class="card-body">
							<form action="{{ route('ui.players.search') }}" method="POST">
                  @csrf
                  <label for="">Search player: </label>
                  <input type="text" name="search" placeholder="Enter search term">
                  <button type="submit">Search</button>
              </form>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card-body">
							<label for="">Filter: </label>
							<select id="filterDropdown">
								<option value="option1">Option 1</option>
								<option value="option2">Option 2</option>
								<option value="option3">Option 3</option>
							</select>
						</div>

					</div>
					<div class="col-sm-4">
					<div class="card-body">
                        <label for="">Sort: </label>
                        <select onchange="sortPlayers(this.value)">
                            <option value="">Sort by</option>
                            <option value="name">Name</option>
                            <option value="goals">Goals</option>
                            <option value="assists">Assists</option>
                        </select>
                    </div>
					</div>
				</div>

		</div>



        <div class="row player-card">
            @foreach($players as $tp)
          		<div class="col-3" sytle="">
          			<div class="card">
          				<img src="{{ asset('/css/ui/images/'.$tp->player_photo)}}" alt="Player Image" class="card-img">
         				<div class="card-body">
							<p class="card-text">Name: {{$tp->player_name}}</p>
							<p class="card-text">Position: {{$tp->position}}</p>
							<p class="card-text">Club: {{$tp->team->team_name}}</p>
							<button class="btn">View Profile</button>
          				</div>
        			</div>
          		</div>
				@endforeach
        	</div>
      </div>
    </div>


    
    <div class="container site-section">
      <div class="row">
        <div class="col-6 title-section">
          <h2 class="heading">Our Blog</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="custom-media d-flex">
            <div class="img mr-4">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <span class="meta">May 20, 2020</span>
              <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
              <p><a href="#">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="custom-media d-flex">
            <div class="img mr-4">
              <img src="images/img_3.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <span class="meta">May 20, 2020</span>
              <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
              <p><a href="#">Read more</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
