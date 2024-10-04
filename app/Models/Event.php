<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date_time',
        'ticket_price',
        'venue',
    ];

    public function event()
    {
        return $this->hasMany(Ticket::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
