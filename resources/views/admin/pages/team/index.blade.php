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
                        <li class="breadcrumb-item" aria-current="page">Team</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pc-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="fw-bold">Premier League</h5>
                    </div>
                    <div class="card-body">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Win</th>
                                    <th>Draw</th>
                                    <th>Lose</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td><strong class="text-white">MC</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Inline Text Elements</h5>
                    </div>
                    <div class="card-body">
                        <p class="lead m-t-0">Your title goes here</p> You can use the mark tag to <mark>highlight</mark>
                        text. <br> <del>This line of text is meant to be treated as deleted text.</del> <br> <ins>This line
                            of text is meant to be treated as an addition to the document.</ins> <br> <strong>rendered as
                            bold text</strong> <br> <em>rendered as italicized text</em>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
