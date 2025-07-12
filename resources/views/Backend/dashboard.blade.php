@extends('Backend.Master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    {{-- <p class="card-text fs-4">{{ $usersCount }}</p> --}}
                </div>
            </div>
        </div>
        <!-- Add more cards/widgets here -->
    </div>
@endsection
