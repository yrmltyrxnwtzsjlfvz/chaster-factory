<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TasksTaskFailedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TasksTaskFailedActionLog>
 *
 * @method        TasksTaskFailedActionLog   create(array|callable $attributes = [])
 * @method static TasksTaskFailedActionLog   createOne(array $attributes = [])
 * @method static TasksTaskFailedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TasksTaskFailedActionLog[] createSequence(iterable|callable $sequence)
 */
final class TasksTaskFailedActionLogFactory extends TasksTaskCompletedActionLogFactory
{
    public static function class(): string
    {
        return TasksTaskFailedActionLog::class;
    }
}
