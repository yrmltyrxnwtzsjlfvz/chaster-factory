<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\TaskPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\TasksVoteEndedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TasksVoteEndedActionLog>
 *
 * @method        TasksVoteEndedActionLog   create(array|callable $attributes = [])
 * @method static TasksVoteEndedActionLog   createOne(array $attributes = [])
 * @method static TasksVoteEndedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TasksVoteEndedActionLog[] createSequence(iterable|callable $sequence)
 */
final class TasksVoteEndedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return TasksVoteEndedActionLog::class;
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
