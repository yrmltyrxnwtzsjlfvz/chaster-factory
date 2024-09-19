<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TimeLogsRevealedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TimeLogsRevealedActionLog>
 *
 * @method        TimeLogsRevealedActionLog   create(array|callable $attributes = [])
 * @method static TimeLogsRevealedActionLog   createOne(array $attributes = [])
 * @method static TimeLogsRevealedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TimeLogsRevealedActionLog[] createSequence(iterable|callable $sequence)
 */
class TimeLogsRevealedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return TimeLogsRevealedActionLog::class;
    }
}
