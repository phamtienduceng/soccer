<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.user.update', $user->user_id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="user_role">Role</label>
                        <select name="user_role" id="user_role" class="form-control">
                            <option value="Admin" {{ $user->user_role == 'Admin' ? 'selected' : '' }}>
                                Admin</option>
                            <option value="Moderator" {{ $user->user_role == 'Moderator' ? 'selected' : '' }}>
                                Moderator</option>
                            <option value="Member" {{ $user->user_role == 'Member' ? 'selected' : '' }}>
                                Member</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_status">Status</label>
                        <select name="user_status" id="user_status" class="form-control">
                            <option value="Active" {{ $user->user_status == 'Active' ? 'selected' : '' }}>
                                Active</option>
                            <option value="Inactive" {{ $user->user_status == 'Inactive' ? 'selected' : '' }}>
                                Inactive</option>
                            <option value="Banned" {{ $user->user_status == 'Banned' ? 'selected' : '' }}>
                                Banned</option>
                        </select>
                    </div>
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
