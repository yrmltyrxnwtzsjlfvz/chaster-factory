<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\TaskPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\TasksTaskAssignedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TasksTaskAssignedActionLog>
 *
 * @method        TasksTaskAssignedActionLog   create(array|callable $attributes = [])
 * @method static TasksTaskAssignedActionLog   createOne(array $attributes = [])
 * @method static TasksTaskAssignedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TasksTaskAssignedActionLog[] createSequence(iterable|callable $sequence)
 */
final class TasksTaskAssignedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return TasksTaskAssignedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => TaskPayloadFactory::new(),
        ]);
    }
}
