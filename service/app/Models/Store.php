<?php

namespace App\Models;

use App\Models\Address\ZipCode;
use App\Models\Traits\FilterByQuery;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, FilterByQuery ,HasUuids, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    
    protected $fillable = [
        'name',
        'address',
        'phone',
        'opening_date',
        'zip_code_id',
    ];

    // Relación muchos a uno
    public function ZipCode()
    {
        return $this->belongsTo(ZipCode::class);
    }
}
