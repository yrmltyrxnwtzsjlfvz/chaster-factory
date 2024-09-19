<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterFactory\Factory\SegmentFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\WheelOfFortunePayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<WheelOfFortunePayload>
 *
 * @method        WheelOfFortunePayload   create(array|callable $attributes = [])
 * @method static WheelOfFortunePayload   createOne(array $attributes = [])
 * @method static WheelOfFortunePayload[] createMany(int $number, array|callable $attributes = [])
 * @method static WheelOfFortunePayload[] createSequence(iterable|callable $sequence)
 */
final class WheelOfFortunePayloadFactory extends ObjectFactory
{
    public static function class(): string
    {
        return WheelOfFortunePayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'segment' => SegmentFactory::new(),
        ];
    }
}
