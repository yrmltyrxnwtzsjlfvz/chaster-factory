<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\PilloryInPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<PilloryInPayload>
 *
 * @method        PilloryInPayload   create(array|callable $attributes = [])
 * @method static PilloryInPayload   createOne(array $attributes = [])
 * @method static PilloryInPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static PilloryInPayload[] createSequence(iterable|callable $sequence)
 */
final class PilloryInPayloadFactory extends DurationPayloadFactory
{
    public static function class(): string
    {
        return PilloryInPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'reason' => self::faker()->sentence(),
        ]);
    }
}
