<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name_event', 'location', 'description', 'date_start', 'date_finish', 'quota', 'photo'];
}
