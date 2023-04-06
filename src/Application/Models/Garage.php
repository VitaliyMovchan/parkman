<?php

namespace App\Application\Models;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    public function test()
    {
        return self::query()->first();
    }
}