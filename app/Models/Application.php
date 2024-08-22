<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Application extends Model
{
    use HasUuids;
    use HasApiTokens;

    protected $guarded = ['id'];
}
