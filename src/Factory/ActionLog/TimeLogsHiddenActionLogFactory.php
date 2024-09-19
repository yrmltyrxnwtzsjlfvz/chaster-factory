<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TimeLogsHiddenActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TimeLogsHiddenActionLog>
 *
 * @method        TimeLogsHiddenActionLog   create(array|callable $attributes = [])
 * @method static TimeLogsHiddenActionLog   createOne(array $attributes = [])
 * @method static TimeLogsHiddenActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TimeLogsHiddenActionLog[] createSequence(iterable|callable $sequence)
 */
class TimeLogsHiddenActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return TimeLogsHiddenActionLog::class;
    }
}
