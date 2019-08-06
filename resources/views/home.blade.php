@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (Auth::check())
                            @include('event/list')
                        @else
                            Click <a href="#">here</a> to create a new GamingPlatform account and begin creating your own Events!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
