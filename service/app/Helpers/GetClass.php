<?php

use App\Models\Store;
use App\Models\Company;

use App\Exceptions\ModelNotAceptable;

function getClassName($name): string
{
    $classMap = [
        'stores' => Store::class,
        'companies' => Company::class
    ];

    return $classMap[$name] ?? throw new ModelNotAceptable('El modelo no es aceptado');
}
