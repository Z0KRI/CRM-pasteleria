<?php

namespace App\Http\Traits;

use App\Exceptions\ErrorCredentials;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Throwable;

class ErrorHandler
{
    public static function validateException(Throwable $e, Request $request): array
    {
        // dd($e, get_class($e));
        $response['errors'] = [];
        $response['message'] = $e->getMessage();
        $response['code'] = Response::HTTP_INTERNAL_SERVER_ERROR;

        if ($e instanceof AccessDeniedHttpException) {
            $response['code'] = Response::HTTP_FORBIDDEN;
            $response['message'] = $e->getMessage();
        }
        if ($e instanceof ErrorCredentials) {
            $response['code'] = Response::HTTP_UNAUTHORIZED;
            $response['message'] = $e->getMessage();
        }
        if ($e instanceof NotFoundHttpException) {
            $response['code'] = Response::HTTP_NOT_FOUND;
            $response['message'] = 'Elemento no encontrado';
        }
        if ($e instanceof UnauthorizedException) {
            $response['code'] = Response::HTTP_FORBIDDEN;
            $response['message'] = 'Acción no autorizada';
            $response['errors'] = $e->getMessage();
        }
        if ($e instanceof ValidationException) {
            $response['errors'] = $e->validator->errors()->getMessages();
            $response['code'] = Response::HTTP_UNPROCESSABLE_ENTITY;
        }
        if ($e instanceof MethodNotAllowedHttpException) {
            $response['message'] = "The {$request->getMethod()} method is not supported for this route";
            $response['code'] = Response::HTTP_METHOD_NOT_ALLOWED;
        }
        if ($e instanceof \BadMethodCallException) {
            $response['message'] = "Error de ejecución, por favor contacte al administrador";
        }
        if ($e instanceof \ParseError || $e instanceof \Error) {
            $response['message'] = "Error durante la ejecución, por favor contacte al administrador";
        }
        return self::errorsDB($e, $response);
    }

    public static function errorsDB(Throwable $e, $response): array
    {
        if ($e instanceof QueryException) {
            $code = $e->getCode();
            switch ($code) {
                case 'HY000':
                    $response['message'] = 'Datos faltantes al insertar';
                    break;
                case '23000':
                    $response['message'] = 'Elemento duplicado';
                    $response['code'] = Response::HTTP_UNPROCESSABLE_ENTITY;
                    break;
                case '1049':
                    $response['message'] = 'Error de conexión, contacte al administrador.';
                    break;
                case '1045':
                    $response['message'] = 'Acceso denegado a la base de datos, contacte al administrador.';
                    break;
                default:
                    $response['message'] = 'Error. Contacte al administrador. Código de error: ' . $e->getCode();
            }
        }
        return $response;
    }
}
