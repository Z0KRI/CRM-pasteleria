<?php

namespace App\Models\Address;

use App\Models\Traits\FilterByQuery;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, HasUuids, SoftDeletes, FilterByQuery;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'state_id'];

    public function State()
    {
        return $this->belongsTo(State::class);
    }
}
