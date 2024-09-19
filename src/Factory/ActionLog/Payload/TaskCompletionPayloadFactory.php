<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TaskCompletionPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TaskCompletionPayload>
 *
 * @method        TaskCompletionPayload   create(array|callable $attributes = [])
 * @method static TaskCompletionPayload   createOne(array $attributes = [])
 * @method static TaskCompletionPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static TaskCompletionPayload[] createSequence(iterable|callable $sequence)
 */
final class TaskCompletionPayloadFactory extends TaskPayloadFactory
{
    public static function class(): string
    {
        return TaskCompletionPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'pointsEarned' => self::faker()->optional()->randomDigit(),
        ]);
    }
}
