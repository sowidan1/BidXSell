<?php
namespace App\Facades\PS;

use Illuminate\Support\Facades\Facade;

class JsonFlattenerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'JsonFlattenerService';
    }
}
