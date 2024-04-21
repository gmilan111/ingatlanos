<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

if(!function_exists('___')){
    function ___(string $word): string{
        return GoogleTranslate::trans($word, app()->getLocale());
        /*return $word;*/
    }
}
