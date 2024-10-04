<?php
namespace App\Facades\ETS;

use Illuminate\Support\Facades\Facade;

class EventFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'EventService';
    }
}
