<?php

namespace App\Models;

use App\Models\Traits\FilterByQuery;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, FilterByQuery ,HasUuids, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    
    protected $fillable = [
        'name',
        'paternal_surname',
        'maternal_surname',
        'salary',
        'store_id',
        'user_id',
        'job_id'
    ];
}
