<div class="modal fade" id="update_team" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.team.update', $team->team_id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="user_role">Name</label>
                        <input type="text" class="form-control" name="team_name" value="{{ $team->team_name }}">
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Premier League</label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="pl" name="isPremierLeague"
                                    value="{{ $team->isPremierLeague }}"
                                    {{ $team->isPremierLeague == 'Active' ? 'checked' : '' }}>
                                <span id="spl">{{ $team->isPremierLeague }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">FA</label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fa" name="isFA"
                                    value="{{ $team->isFA }}" {{ $team->isFA == 'Active' ? 'checked' : '' }}> 
                                <span id="sfa">{{ $team->isFA }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Community Shield</label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="cs" name="isCommunityShield"
                                    value="{{ $team->isCommunityShield }}"
                                    {{ $team->isCommunityShield == 'Active' ? 'checked' : '' }}>
                                <span id="scs">{{ $team->isCommunityShield }}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const checkboxes = document.querySelectorAll('.form-check-input');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const span = document.querySelector(`#s${checkbox.id}`);

            if (checkbox.checked) {
                span.textContent = 'Active';
                checkbox.value = 'Active';
            } else {
                span.textContent = 'Inactive';
                checkbox.value = 'Inactive';
            }
        });
    });
</script>
