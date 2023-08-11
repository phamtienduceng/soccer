<div class="modal fade" id="modal{{ $match->match_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.match.updateScore', $match->match_id)}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">{{ $match->homeTeam->team_name }}</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" value="{{ $match->home_goals }}"
                                name="home_goals" min= "0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">{{ $match->awayTeam->team_name }}</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" value="{{ $match->away_goals }}"
                                name="away_goals" min= "0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
