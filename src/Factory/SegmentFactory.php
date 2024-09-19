<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Enums\WheelOfFortuneSegmentType;
use Fake\ChasterObjects\Objects\Extension\WheelOfFortune\Segment;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Segment>
 *
 * @method        Segment   create(array|callable $attributes = [])
 * @method static Segment   createOne(array $attributes = [])
 * @method static Segment[] createMany(int $number, array|callable $attributes = [])
 * @method static Segment[] createSequence(iterable|callable $sequence)
 */
final class SegmentFactory extends ObjectFactory
{
    public static function class(): string
    {
        return Segment::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        /** @var WheelOfFortuneSegmentType $type */
        $type = self::faker()->randomElement(WheelOfFortuneSegmentType::cases());

        return [
            'duration' => self::faker()->numberBetween(60, 3600),
            'text' => $type->equals(WheelOfFortuneSegmentType::TEXT) ? self::faker()->sentence() : null,
            'type' => $type,
        ];
    }
}
