<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Filters
{
    public function getIndex(
        Request $request,
        mixed   $object,
        array   $filters = [],
        string  $orderBy = 'id',
        string  $order = "desc",
    )
    {
        $orderQuery = $this->getOrderByQuery($request, $orderBy, $order);
        $query = $object::orderBy($orderQuery['orderBy'], $orderQuery['order']);
        $query = $this->getFilterQueryLike($request, $filters, $query);
        return $this->getFilterQuery($request, $filters, $query);
    }

    protected function paginated(Request $request, $query)
    {
        $perPageValid = intval($request->query('per-page'));
        $per_page = $perPageValid > 0 ? $perPageValid : 10;
        return $query->paginate($per_page);
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
