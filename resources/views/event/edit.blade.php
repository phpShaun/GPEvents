@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @auth
                    <div class="card-header">
                        {{ isset($event->name) ? $event->name : 'Create a new Event' }}
                    </div>

                    <div class="card-body">
                        @if(count($errors))
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form id="event" action="{{URL::to('/')}}/event" method="POST" autocomplete="off">
                            @csrf
                            <input type="hidden" name="id" class="form-control" value="{{ isset($event->id) ? $event->id : '' }}"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" name="name" id="name" type="text" value="{{ isset($event->name) ? $event->name : '' }}" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input class="form-control" name="title" id="title" type="text" value="{{ isset($event->title) ? $event->title : '' }}" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Start Date</label>
                                        <input class="form-control datepicker" name="start_date" id="start_date" type="text" value="{{ isset($event->start_date) ? $event->start_date : '' }}" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">End Date</label>
                                        <input class="form-control datepicker" name="end_date" id="end_date" type="text" value="{{ isset($event->end_date) ? $event->end_date : '' }}" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Platform</label>
                                        <input class="form-control" name="platform" id="platform" type="text" value="{{ isset($event->platform) ? $event->platform : '' }}" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Game</label>
                                        <input class="form-control" name="game" id="game" type="text" value="{{ isset($event->game) ? $event->game : '' }}" required/>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Additional Information</label> 
                                        <textarea class="form-control" name="additional_info" id="additional_info">{{ isset($event->additional_info) ? $event->additional_info : '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="float-right">
                                <button id="save" class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="card-body">
                        <p>You must be logged in to create or edit an Event. Click <a href="{{ URL::to('/') }}/login">here</a> to login.</p>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.datepicker').datetimepicker({
                format: "YYYY-MM-DD hh:mm:ss",
                sideBySide: true,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: "fa fa-chevron-left",
                    next: "fa fa-chevron-right",
                    today: "fa fa-crosshairs",
                    clear: "fa fa-trash-o",
                    close: "fa fa-remove",
                }
            });
        });
    </script>
@endsection