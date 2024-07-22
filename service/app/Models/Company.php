<?php

namespace App\Models;

use App\Models\Address\ZipCode;

use App\Models\Traits\FilterByQuery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Company extends Model
{
    use HasFactory, FilterByQuery, HasUuids, SoftDeletes;
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
        'opening_date',
        'rfc',
        'slogan',
        'logo',
        'zip_code_id',
    ];

    public function ZipCode()
    {
        return $this->belongsTo(ZipCode::class);
    }

    public function Warehouse()
    {
        return $this->morphMany(Warehouse::class, 'warehouseable');
    }
}
