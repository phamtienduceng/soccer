@extends('admin.layouts.app')

@section('title', 'Team ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Team</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">Team</a></li>
                        <li class="breadcrumb-item" aria-current="page">Create</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Team name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="team_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Premier League</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="pl"
                                            name="isPremierLeague" value="Inactive">
                                        <span id="spl">Inactive</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">FA</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="fa" name="isFA"
                                            value="Inactive">
                                        <span id="sfa">Inactive</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Community Shield</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="cs"
                                            name="isCommunityShield" value="Inactive">
                                        <span id="scs">Inactive</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="customFile" name="logo" />

                                </div>
                            </div>
                            <hr>
                            <p class="card-title text-center">
                                <button type="submit" class="btn btn-link">Create</button>
                            </p>
                        </form>
                    </div>
                </div>
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
@endsection
