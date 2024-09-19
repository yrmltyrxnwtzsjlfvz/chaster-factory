<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TemporaryOpeningLockedPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TemporaryOpeningLockedPayload>
 *
 * @method        TemporaryOpeningLockedPayload   create(array|callable $attributes = [])
 * @method static TemporaryOpeningLockedPayload   createOne(array $attributes = [])
 * @method static TemporaryOpeningLockedPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static TemporaryOpeningLockedPayload[] createSequence(iterable|callable $sequence)
 */
final class TemporaryOpeningLockedPayloadFactory extends ObjectFactory
{
    public static function class(): string
    {
        return TemporaryOpeningLockedPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'penaltyTime' => self::faker()->numberBetween(0, 3600),
            'unlockedTime' => self::faker()->numberBetween(0, 3600),
        ];
    }
}
