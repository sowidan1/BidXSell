<?php

namespace App\Models;

use App\Enums\TicketCategoriesEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'customer_name',
        'customer_email',
        'number_of_tickets',
        'ticket_type',
        'backstage_access',
        'complimentary_drinks',
        'seat_preference',
        'group_name',
        'special_requests',
    ];

    public function tickets()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public static function createTicket($validatedData, Event $event)
    {
        $ticket = new self($validatedData);

        switch ($validatedData['ticket_type']) {
            case TicketCategoriesEnums::VIP_ADMISSION:
                $ticket->backstage_access = $validatedData['backstage_access'] ?? null;
                $ticket->complimentary_drinks = $validatedData['complimentary_drinks'] ?? null;
                break;
            case TicketCategoriesEnums::GENERAL_ADMISSION:
                $ticket->seat_preference = $validatedData['seat_preference'] ?? null;
                break;
            case TicketCategoriesEnums::GROUP_BOOKING:
                $ticket->group_name = $validatedData['group_name'] ?? null;
                $ticket->special_requests = $validatedData['special_requests'] ?? null;
                break;
        }

        return $event->tickets()->save($ticket);
    }
}
