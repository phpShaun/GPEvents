@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@guest Welcome @else My Events @endguest</div>

                    <div class="card-body">
                        @guest
                            <p>Welcome to GamingPlatform! Click <a href="{{URL::to('/')}}/register">here</a> to register and begin creating your own Events!</p>
                            <p>If you already have an account click <a href="{{URL::to('/')}}/login">here</a> to login.</p>
                        @else
                            <a class="btn btn-app" href="{{URL::to('/')}}/event/create">Create new Event</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($events as $event)
                                    <tr>
                                        <td><a href="{{URL::to('/')}}/event/{{ $event->id }}/edit">{{ $event->name }}</a></td>
                                        <td>{{ $event->title }}</td>
                                        <td><a href="{{URL::to('/')}}/event/{{ $event->id }}" target="_BLANK">{{URL::to('/')}}/event/{{ $event->id }}</a></td>
                                    </tr>
                                    @empty
                                        <tr><td colspan="3">You have not created any events. Click <a href="{{URL::to('/')}}/event/create">here</a> to create one.</td></tr>
                                    @endforelse
                                </tbody>
                                <div class="float-right">
                                    {{ $events->links() }}
                                </div>
                            </table>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection