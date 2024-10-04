<?php
namespace App\Services\ETS;

use App\Models\Event;
use App\Models\Ticket;

class EventService
{
    public function index()
    {
        return Event::orderBy("created_at","desc")->paginate(10);
    }

    public function store($request)
    {
        $validated = $request->validated();
        return Event::create($validated);
    }

    public function purchase($request, $event){
        $validated = $request->validated();
        return Ticket::createTicket($validated, $event);
    }

    public function getEventWithTickets($id){
        return Event::findOrFail($id);
    }
}
