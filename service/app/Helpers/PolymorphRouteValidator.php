<?php

namespace App\Helpers;

class PolymorphRouteValidator
{
    public static function UUID()
    {
        return [
            'modelId' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}',
            'model' => '[a-z]+'
        ];
    }
}
