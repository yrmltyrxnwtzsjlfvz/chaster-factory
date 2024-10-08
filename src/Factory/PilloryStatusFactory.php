<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Objects\Lock\PilloryStatus;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<PilloryStatus>
 *
 * @method        PilloryStatus   create(array|callable $attributes = [])
 * @method static PilloryStatus   createOne(array $attributes = [])
 * @method static PilloryStatus[] createMany(int $number, array|callable $attributes = [])
 * @method static PilloryStatus[] createSequence(iterable|callable $sequence)
 */
final class PilloryStatusFactory extends ObjectFactory
{
    public static function class(): string
    {
        return PilloryStatus::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'id' => self::faker()->slug(),
            'numberOfVotes' => self::faker()->randomDigit(),
            'totalDurationAdded' => self::faker()->numberBetween(60, 86400),
            'voteEndsAt' => self::faker()->dateTimeBetween(startDate: 'now', endDate: '+1 day'),
            'canVote' => self::faker()->boolean(),
            'reason' => self::faker()->sentence(),
            'createdAt' => self::faker()->dateTime(),
        ];
    }
}
