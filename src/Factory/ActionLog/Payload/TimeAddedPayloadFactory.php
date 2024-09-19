<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TimeAddedPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TimeAddedPayload>
 *
 * @method        TimeAddedPayload   create(array|callable $attributes = [])
 * @method static TimeAddedPayload   createOne(array $attributes = [])
 * @method static TimeAddedPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static TimeAddedPayload[] createSequence(iterable|callable $sequence)
 */
final class TimeAddedPayloadFactory extends ObjectFactory
{
    public static function class(): string
    {
        return TimeAddedPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'timeAdded' => self::faker()->numberBetween(60, 3600),
        ];
    }
}
