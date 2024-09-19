<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\WheelOfFortunePayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\WheelOfFortuneTurnedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<WheelOfFortuneTurnedActionLog>
 *
 * @method        WheelOfFortuneTurnedActionLog   create(array|callable $attributes = [])
 * @method static WheelOfFortuneTurnedActionLog   createOne(array $attributes = [])
 * @method static WheelOfFortuneTurnedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static WheelOfFortuneTurnedActionLog[] createSequence(iterable|callable $sequence)
 */
final class WheelOfFortuneTurnedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return WheelOfFortuneTurnedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => WheelOfFortunePayloadFactory::new(),
        ]);
    }
}
