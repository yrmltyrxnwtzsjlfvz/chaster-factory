<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\TaskCompletionPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\TasksTaskCompletedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TasksTaskCompletedActionLog>
 *
 * @method        TasksTaskCompletedActionLog   create(array|callable $attributes = [])
 * @method static TasksTaskCompletedActionLog   createOne(array $attributes = [])
 * @method static TasksTaskCompletedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TasksTaskCompletedActionLog[] createSequence(iterable|callable $sequence)
 */
class TasksTaskCompletedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return TasksTaskCompletedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => TaskCompletionPayloadFactory::new(),
        ]);
    }
}
