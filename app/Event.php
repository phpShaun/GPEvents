<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    protected $fillable = ['name', 'title', 'start_date', 'end_date', 'platform', 'game', 'additional_info'];
}
