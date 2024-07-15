<?php

namespace App\Models;

use App\Helpers\Formatters;
use App\Models\Traits\FilterByQuery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory, FilterByQuery, HasUuids, SoftDeletes;

    protected $hidden = ['deleted_at', 'updated_at'];

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'warehouseable_type',
        'warehouseable_id',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = Formatters::slug($model->name);
        });
        self::updating(function ($model) {
            $model->slug = Formatters::slug($model->name);
        });
    }
}
