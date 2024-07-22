<?php

namespace App\Helpers;

class Formatters
{
    public static function slug(string $text, string $divider = '-'): string
    {
        // Replace non-letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // Transliterate to ASCII
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // Trim divider from ends
        $text = trim($text, $divider);

        // Remove duplicate dividers
        $text = preg_replace('~-+~', $divider, $text);

        // Convert to lowercase
        $text = strtolower($text);

        // Return a default value if text is empty
        return empty($text) ? 'n-a' : $text;
    }
}
