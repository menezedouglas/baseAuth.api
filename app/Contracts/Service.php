<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface Service
{
    public static function query(): Builder;
}
