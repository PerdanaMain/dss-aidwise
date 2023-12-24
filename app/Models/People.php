<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $table = 'peoples';
    protected $primaryKey = 'people_id';
    protected $fillable = [
        "code_name",
        "name",
        "phone",
        "address",
        "created_at",
        "updated_at",
    ];
}
