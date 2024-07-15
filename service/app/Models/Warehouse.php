<?php

namespace App\Models;

use App\Models\Traits\FilterByQuery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory, FilterByQuery, HasUuids, SoftDeletes;

    protected $hidden = ['deleted_at'];

    protected $fillable = [
        'name',
        'warehouseable_type',
        'warehouseable_id',
    ];
}
