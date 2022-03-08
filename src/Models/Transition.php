<?php

namespace LucaTerribili\LaravelWorkflow\Models;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    /**
     * @var string[]
     */
    protected $casts = [
        'from' => 'array'
    ];
}
