<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait SuccessResponse
{
  public function response(
    $data,
    string $method = 'GET',
    string $message = '',
    int $code = Response::HTTP_OK,
    bool $success = true
  ): JsonResponse {
    $response = [
      "http" => [
        "status" => $code,
        "message" => $message,
        "method" => $method,
        "success" => $success
      ],
      "data" => $data,
    ];
    return response()->json($response, $code);
  }

  public function responseWithPagination($paginator, $resource = null): JsonResponse
  {
    $totalRows = $paginator->total();
    $currentPage = $paginator->currentPage();
    $totalPages = $paginator->lastPage();
    $nextPage = ($totalPages > $currentPage) ? ($currentPage + 1) : $currentPage;
    $prevPage = ($currentPage === 1) ? null : ($currentPage - 1);

    $data = $resource && class_exists($resource) ? $resource::collection($paginator->items()) : $paginator->items();

    $response = [
      "http" => [
        "status" => Response::HTTP_OK,
        "message" => null,
        "method" => "GET",
        "success" => true
      ],
      "data" => $data,
      "pages" => [
        "currentPage" => $currentPage,
        "nextPage" => $nextPage,
        "totalPages" => $totalPages,
        "perPage" => $paginator->perPage(),
        "totalRecords" => $totalRows,
        "prevPage" => $prevPage
      ]
    ];
    return response()->json($response, Response::HTTP_OK);
  }
}
