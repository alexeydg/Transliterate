<?php

namespace alexeydg\Transliterate;

use Illuminate\Support\Facades\Facade;

class TransliterationFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Transliteration';
    }
}