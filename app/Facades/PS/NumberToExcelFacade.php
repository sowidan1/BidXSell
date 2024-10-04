<?php
namespace App\Facades\PS;

use Illuminate\Support\Facades\Facade;

class NumberToExcelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'NumberToExcelService';
    }
}
