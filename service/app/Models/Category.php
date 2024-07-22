<?php

namespace App\Models;

use App\Models\Traits\FilterByQuery;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasUuids, SoftDeletes, FilterByQuery;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description'];

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'categories_products',
            'category_id', 'product_id');
    }
}
