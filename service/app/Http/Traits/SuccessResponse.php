<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait SuccessResponse
{
  /**
   * Generates a standardized JSON response.
   *
   * @param mixed $data
   * @param string $method
   * @param string $message
   * @param int $code
   * @param bool $success
   * @return JsonResponse
   */
  public function response(
    $data,
    string $method = 'GET',
    string $message = '',
    int $code = Response::HTTP_OK,
    bool $success = true
  ): JsonResponse {
    return response()->json([
      'http' => [
        'status' => $code,
        'message' => $message,
        'method' => $method,
        'success' => $success,
      ],
      'data' => $data,
    ], $code);
  }

  /**
   * Generates a paginated JSON response.
   *
   * @param mixed $paginator
   * @param string|null $resource
   * @return JsonResponse
   */
  public function responseWithPagination($paginator, ?string $resource = null): JsonResponse
  {
    $data = $resource && class_exists($resource)
      ? $resource::collection($paginator->items())
      : $paginator->items();

    return response()->json([
      'http' => [
        'status' => Response::HTTP_OK,
        'message' => null,
        'method' => 'GET',
        'success' => true,
      ],
      'data' => $data,
      'meta' => [
        'currentPage' => $paginator->currentPage(),
        'nextPage' => $paginator->currentPage() < $paginator->lastPage()
          ? $paginator->currentPage() + 1
          : null,
        'totalPages' => $paginator->lastPage(),
        'perPage' => $paginator->perPage(),
        'totalRecords' => $paginator->total(),
        'prevPage' => $paginator->currentPage() > 1
          ? $paginator->currentPage() - 1
          : null,
      ],
    ], Response::HTTP_OK);
  }
}
