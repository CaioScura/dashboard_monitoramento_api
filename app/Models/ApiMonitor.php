<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiMonitor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'is_active', 'response_time', 'last_checked'];
}

