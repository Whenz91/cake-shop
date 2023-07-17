<?php

namespace App\Helpers;

class TextHelper
{
    public static function transformText($text)
    {
        // Convert to lover case
        $text = mb_strtolower($text, 'UTF-8');
    
        // Replace caracters
        $text = str_replace(
            ['á', 'é', 'í', 'ó', 'ö', 'ő', 'ú', 'ü', 'ű'],
            ['a', 'e', 'i', 'o', 'o', 'o', 'u', 'u', 'u'],
            $text
        );
    
        // Replace space
        $text = str_replace(' ', '_', $text);
    
        return $text;
    }
    
}
