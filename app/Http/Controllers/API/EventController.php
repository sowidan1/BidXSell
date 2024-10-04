<?php

namespace App\Http\Controllers\API;

use App\Facades\ETS\EventFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\PurchaseRequest;
use App\Http\Requests\API\StoreEventRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = EventFacade::index();
        return ApiResponse::success($events, 'Events retrieved successfully');
    }

    public function store(StoreEventRequest $request)
    {
        $event = EventFacade::store($request);
        return ApiResponse::success($event, 'Event created successfully');
    }

    public function purchase(PurchaseRequest $request, Event $event)
    {
        $ticket = EventFacade::purchase($request, $event);
        return $ticket
            ? ApiResponse::success($ticket->load('event'), 'Ticket purchased successfully')
            : ApiResponse::error('Ticket could not be purchased', 422);
    }

    public function showEventWithTickets($id)
    {
        $event = EventFacade::getEventWithTickets($id);
        if ($event) {
            $event->load('tickets');
            return ApiResponse::success($event, 'Event retrieved successfully');
        }
        return ApiResponse::error('Event not found',404);
    }
}
