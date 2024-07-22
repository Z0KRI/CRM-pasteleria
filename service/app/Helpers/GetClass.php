<?php

use App\Models\Store;
use App\Models\Company;

use App\Exceptions\ModelNotAceptable;
use Illuminate\Http\Response;

function getClassName($name): string
{
    $classMap = [
        'store' => Store::class,
        'company' => Company::class
    ];

    return $classMap[$name] ?? throw new ModelNotAceptable('El modelo no es aceptado', Response::HTTP_BAD_REQUEST);
}
