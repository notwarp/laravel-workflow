<?php

namespace LucaTerribili\LaravelWorkflow\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    /**
     * @var string[]
     */
    protected $casts = [
        'supports' => 'array',
        'places' => 'array',
        'last_places' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transitions()
    {
        return $this->hasMany($this->getTransitionModel(), 'workflow_id');
    }

    /**
     * @param $flat
     *
     * @return mixed[]
     */
    public function getAllStatusAttribute($flat = false)
    {
        if ($flat) {
            return collect($this->places)->map(callback: fn ($place) => collect($place)->only('name')->flatten()->toArray())->flatten()->toArray();
        } else {
            return collect($this->places)->pluck('name', 'label')->toArray();
        }
    }

    /**
     * @return mixed[]
     */
    public function getFromStatusAttribute()
    {
        $status = collect($this->places)->pluck('label', 'name')->toArray();

        foreach ($this->last_places as $place) {
            Arr::pull($status, $place);
        }

        return $status;
    }

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function getTransitionModel()
    {
        return config('workflow.models.transition');
    }
}
