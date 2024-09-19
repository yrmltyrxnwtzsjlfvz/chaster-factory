<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\DurationPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\TimeChangedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TimeChangedActionLog>
 *
 * @method        TimeChangedActionLog   create(array|callable $attributes = [])
 * @method static TimeChangedActionLog   createOne(array $attributes = [])
 * @method static TimeChangedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TimeChangedActionLog[] createSequence(iterable|callable $sequence)
 */
final class TimeChangedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return TimeChangedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => DurationPayloadFactory::new(),
        ]);
    }
}
