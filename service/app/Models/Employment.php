<?php

namespace App\Models;

use App\Models\Traits\FilterByQuery;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employment extends Model
{
    use HasFactory, FilterByQuery, HasUuids, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];
}
