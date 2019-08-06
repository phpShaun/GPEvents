@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new Event</div>

                    <div class="card-body">
                        <form id="event" action="{{URL::to('/')}}/event" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" name="name" id="name" type="text"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input class="form-control" name="title" id="title" type="text"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Start Date</label>
                                        <input class="form-control datepicker" name="start_date" id="start_date" type="text"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">End Date</label>
                                        <input class="form-control datepicker" name="end_date" id="end_date" type="text"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Platform</label>
                                        <input class="form-control" name="platform" id="platform" type="text"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Game</label>
                                        <input class="form-control" name="game" id="game" type="text"/>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Additional Information</label> 
                                        <textarea class="form-control" name="additional_info" id="additional_info"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="float-right">
                                <button id="save" class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#start_date').datetimepicker({
                format: "YYYY-MM-DD hh:mm:ss"
            });
        });
    </script>
@endsection