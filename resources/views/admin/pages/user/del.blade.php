<div class="modal fade" id="del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.user.destroy', $user->user_id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    Are you sure you want to delete this user?
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
