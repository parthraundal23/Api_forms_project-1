<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiForm extends Model
{
    use HasFactory;

    // Fillable properties

    protected $fillable = [
        'name',
        'api_access_type',
        'api_method_permission',
        'api_ip_whitelist',
    ];
}
