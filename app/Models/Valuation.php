<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    use HasFactory;
    protected $table = 'valuations';
    protected $primaryKey = 'valuation_id';
    protected $fillable = [
        "code_name",
        "description",
        "level",
        "status",
        "created_at",
        "updated_at",
    ];

    public function Finance(): HasMany
    {
        return $this->hasMany(Finance::class, 'category_id');
    }
}
