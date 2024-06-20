<?php

namespace App\Models\Traits;


use Illuminate\Http\Request;

trait FilterByQuery
{
    public function scopeFilterQuery($query, array $filters, Request $request)
    {
        foreach ($filters as $filter) {
            $valueRequest = $request->query($filter);
            if (!is_null($valueRequest)) {
                $query->where($filter, $valueRequest);
            }
        }
        return $query;
    }

    public function scopeFilterQueryLike($query, array $filters, string $searchTerm = null)
    {
        if (is_null($searchTerm)) {
            return $query;
        }
        $query->where(function ($query) use ($filters, $searchTerm) {
            foreach ($filters as $filter) {
                if (is_string($filter)) {
                    $query->orWhere($filter, 'like', '%' . $searchTerm . '%');
                }
            }
        });

        return $query;
    }
}
