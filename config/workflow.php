<?php

return [
    'models' => [
        'workflow' => LucaTerribili\LaravelWorkflow\Models\Workflow::class,
        'transition' => LucaTerribili\LaravelWorkflow\Models\Transition::class,
    ],
    'support_content' => [],
    'events_to_dispatch' => [
        Symfony\Component\Workflow\WorkflowEvents::ENTER,
        Symfony\Component\Workflow\WorkflowEvents::LEAVE,
        Symfony\Component\Workflow\WorkflowEvents::TRANSITION,
        Symfony\Component\Workflow\WorkflowEvents::ENTERED,
        Symfony\Component\Workflow\WorkflowEvents::COMPLETED,
        Symfony\Component\Workflow\WorkflowEvents::ANNOUNCE,
    ],
    'extra_fields' => [],
];
