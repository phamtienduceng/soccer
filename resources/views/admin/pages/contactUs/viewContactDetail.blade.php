@extends('admin.layouts.app')

@section('title', 'Contact ')

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Contact Us</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Contact Us</li>
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
                    <div class="card-header text-center">
                        <h5 class="fw-bold">Contact Information</h5>
                    </div>
                    <div class="card-body">
                    <div class="card-body">
                <div class="form-group">
                    <label for="title" class="label">Name:</label> <span>{{$contact->name}}</span>
                </div>
                <div class="form-group">
                    <label for="price" class="label">Email:</label> <span>{{$contact->email}}</span>
                </div>

                <div class="form-group">
                    <label for="description" class="label">Subject:</label> <span>{{$contact->subject}}</span>
                </div>
                <div class="form-group">
                    <label for="description" class="label">Message:</label> <span>{{$contact->message}}</span>
                </div>
                <div class="form-group">
                <a href="{{ Route('ui.feedback')}}"> 
                    <button type="submit" class="btn btn-primary ">
                             Send
                    </button></a>
                </div>
                        </div>
                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


