<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\MaxLimitIncreasedPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<MaxLimitIncreasedPayload>
 *
 * @method        MaxLimitIncreasedPayload   create(array|callable $attributes = [])
 * @method static MaxLimitIncreasedPayload   createOne(array $attributes = [])
 * @method static MaxLimitIncreasedPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static MaxLimitIncreasedPayload[] createSequence(iterable|callable $sequence)
 */
final class MaxLimitIncreasedPayloadFactory extends ObjectFactory
{
    public static function class(): string
    {
        return MaxLimitIncreasedPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'date' => self::faker()->dateTime(),
        ];
    }
}
