<?php

namespace LucaTerribili\LaravelWorkflow\Models;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    /**
     * @var string[]
     */
    protected $casts = [
        'from' => 'array',
    ];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workflow()
    {
        return $this->belongsTo($this->getWorkflowModel());
    }

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function getWorkflowModel()
    {
        return config('workflow.models.workflow');
    }
}
