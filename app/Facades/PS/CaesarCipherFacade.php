<?php
namespace App\Facades\PS;

use Illuminate\Support\Facades\Facade;

class CaesarCipherFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CaesarCipherService';
    }
}
