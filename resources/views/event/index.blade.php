@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (empty($event))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                This Event does not exist
                            </div>
                        </div>
                    @else 
                        <div class="card-header">{{ $event->name }}</div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Name: </strong>
                                    <p>{{ $event->name }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>Title: </strong>
                                    <p>{{ $event->title }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>Begins at: </strong>
                                    <p>{{ $event->start_date }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>Ends at: </strong>
                                    <p>{{ $event->end_date }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>Platform: </strong>
                                    <p>{{ $event->platform }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>Game: </strong>
                                    <p>{{ $event->game }}</p>
                                </div>

                                @if (!empty($event->additional_info))
                                <div class="col-md-12">
                                    <strong>Additional Information: </strong>
                                    <p>{{ $event->additional_info }}</p>
                                </div>
                                @endif

                                <div class="col-md-12">
                                    <strong>Event URL: </strong>
                                    <pre>{{ URL::to('/') }}/event/{{ $event->id }}</pre>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection