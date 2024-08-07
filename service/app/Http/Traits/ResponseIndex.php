<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait ResponseIndex
{
	/**
	 * @param class-string<Model> $object  The fully qualified class name of the Eloquent model.
	 */
	public function getIndex(
		Request $request,
		$object,
		array   $filters = [],
		string  $orderBy = 'id',
		string  $order = "desc",
		$resource = '',
	) {
		$orderQuery = $this->getOrderByQuery($request, $orderBy, $order);
		if ($object instanceof Builder) {
			$query = $object->orderBy($orderQuery['orderBy'], $orderQuery['order']);
		} else {
			$query = $object::orderBy($orderQuery['orderBy'], $orderQuery['order']);
		}
		$query = $this->getFilterQueryLike($request, $filters, $query);
		$query = $this->getFilterQuery($request, $filters, $query);
		if ($request->query('paginated')) {
			return $this->paginated($request, $query, $resource);
		}
		return $this->response(
			$resource
				? $resource::Collection($query->get())
				: $query->get()
		);
	}

	/**
	 * @param class-string<Model> $object  The fully qualified class name of the Eloquent model.
	 */
	public function getIndexPolymorph(
		Request $request,
		$object,
		string  $field,
		string  $model,
		string  $modelId,
		array   $filters = [],
		string  $orderBy = 'id',
		string  $order = "desc",
		$resource = '',
	) {
		$orderQuery = $this->getOrderByQuery($request, $orderBy, $order);
		$query = $object::orderBy($orderQuery['orderBy'], $orderQuery['order'])
			->where("{$field}_type", getClassName($model))
			->where("{$field}_id", $modelId);

		$query = $this->getFilterQueryLike($request, $filters, $query);
		$query = $this->getFilterQuery($request, $filters, $query);

		if ($request->query('paginated')) {
			return $this->paginated($request, $query, $resource);
		}
		return $this->response(
			$resource
				? $resource::Collection($query->get())
				: $query->get()
		);
	}

	protected function paginated(Request $request, $query, $resource): \Illuminate\Http\JsonResponse
	{
		$perPageValid = intval($request->query('per-page'));
		$per_page = $perPageValid > 0 ? $perPageValid : 10;
		$data = $query->paginate($per_page);
		return $this->responseWithPagination($data, $resource);
	}

	protected function getFilterQueryLike(Request $request, array $filters, $query)
	{
		if (
			$request->query('search')
			&& !empty($filters)
			&& !empty($filters['like'])
		) {
			$query->FilterQueryLike($filters['like'], $request->query('search'));
		}
		return $query;
	}

	protected function getFilterQuery(Request $request, array $filters, $query)
	{
		if (!empty($filters) && !empty($filters['query'])) {
			$query->FilterQuery($filters['query'], $request);
		}
		return $query;
	}

	protected function getOrderByQuery(Request $request, string $orderBy, string $order): array
	{
		$newOrder['orderBy'] = $orderBy;
		$newOrder['order'] = $order;

		$orderValid = ['ASC', 'DESC', 'asc', 'desc'];

		if (
			!is_null($request->query('order'))
			&& in_array($request->query('order'), $orderValid)
		) {
			$newOrder['order'] = $request->query('order');
		}
		$order_by = $request->query('order-by');
		$isNumber = intval($order_by);
		if (
			!is_null($order_by)
			&& $isNumber === 0
			&& is_string($request->query('order-by'))
		) {
			$newOrder['orderBy'] = $request->query('order-by');
		}

		return $newOrder;
	}
}
