<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use LucaTerribili\LaravelWorkflow\Facades\WorkflowFacade;
use LucaTerribili\LaravelWorkflow\WorkflowServiceProvider;

class BaseWorkflowTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [WorkflowServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Workflow' => WorkflowFacade::class,
        ];
    }
}
