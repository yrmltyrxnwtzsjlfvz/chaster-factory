<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterFactory\Factory\TaskFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TaskPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TaskPayload>
 *
 * @method        TaskPayload   create(array|callable $attributes = [])
 * @method static TaskPayload   createOne(array $attributes = [])
 * @method static TaskPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static TaskPayload[] createSequence(iterable|callable $sequence)
 */
class TaskPayloadFactory extends ObjectFactory
{
    public static function class(): string
    {
        return TaskPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'task' => TaskFactory::new(),
        ];
    }
}
