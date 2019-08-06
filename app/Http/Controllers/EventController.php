<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Event;

class EventController extends Controller {

    public function index() {
        return $this->list();
    }

    public function create() {
        return view('event.edit');
    }

    public function list() {
        if( Auth::guest() ) {
            return view('event.list');
        } else {
            $events = DB::table('events')
                        ->where('owner_id', Auth::id())
                        ->simplePaginate(15);

            return view('event.list')->with('events', $events);
        }
    }

    public function save() {

        $this->validate(request(), [
            'name' => 'required|min:5',
            'title' => 'required|min:5',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'end_date' => 'required|date_format:Y-m-d H:i:s',
            'platform' => 'required',
            'game' => 'required'
        ]);

        if( !empty(request('id')) ) {
            $event     = Event::find(request('id'));
        } else {
            $event = new Event();
        }

        $event->owner_id        = Auth::id();
        $event->name            = request('name');
        $event->title           = request('title');
        $event->start_date      = request('start_date');
        $event->end_date        = request('end_date');
        $event->platform        = request('platform');
        $event->game            = request('game');
        $event->additional_info = request('additional_info');

        if($event->save()) {
            return back()->with('message', 'Successfully saved Event.');
        }
        return back()->withErrors(['error' => 'Failed to save Event']);

    }

    public function get($event_id) {
        $event = DB::table('events')
                    ->where('id', $event_id);

        return view('event.index')->with('event', $event->first());
    }

    public function edit($event_id) {
        $event = DB::table('events')
                    ->where('id', $event_id)
                    ->where('owner_id', Auth::id());

        return view('event.edit')->with('event', $event->first());
    }
}
