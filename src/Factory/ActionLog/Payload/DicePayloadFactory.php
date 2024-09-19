<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\DicePayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<DicePayload>
 *
 * @method        DicePayload   create(array|callable $attributes = [])
 * @method static DicePayload   createOne(array $attributes = [])
 * @method static DicePayload[] createMany(int $number, array|callable $attributes = [])
 * @method static DicePayload[] createSequence(iterable|callable $sequence)
 */
final class DicePayloadFactory extends DurationPayloadFactory
{
    public static function class(): string
    {
        return DicePayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'keyholderRoll' => self::faker()->numberBetween(1, 6),
            'wearerRoll' => self::faker()->numberBetween(1, 6),
        ]);
    }
}
