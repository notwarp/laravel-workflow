<?php

namespace LucaTerribili\LaravelWorkflow\Models;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    /**
     * @var string[]
     */
    protected $casts = [
        'supports' => 'array',
        'places' => 'array',
        'last_places' => 'array'
    ];

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function getTransitionModel()
    {
        return config('workflow.models.transition');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transitions()
    {
        return $this->hasMany($this->getTransitionModel(), 'workflow_id');
    }

    /**
     * @param $flat
     * @return mixed[]
     */
    public function getAllStatusAttribute($flat = false)
    {
        if ($flat) {
            return collect($this->places)->map(function ($place) {
                return collect($place)->only('name')->flatten()->toArray();
            })->flatten()->toArray();
        } else {
            return collect($this->places)->pluck('name', 'label')->toArray();
        }

    }
}
