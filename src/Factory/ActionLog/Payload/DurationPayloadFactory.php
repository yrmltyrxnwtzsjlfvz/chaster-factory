<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\DurationPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<DurationPayload>
 *
 * @method        DurationPayload   create(array|callable $attributes = [])
 * @method static DurationPayload   createOne(array $attributes = [])
 * @method static DurationPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static DurationPayload[] createSequence(iterable|callable $sequence)
 */
class DurationPayloadFactory extends ObjectFactory
{
    public static function class(): string
    {
        return DurationPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'duration' => self::faker()->numberBetween(-3600, 3600),
        ];
    }
}
