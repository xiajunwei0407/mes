<?php


namespace Bkqw\Mes\Facades;


use Illuminate\Support\Facades\Facade;

class MesAction extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Bkqw\Mes\MesAction::class;
    }
}
