<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TimerHiddenActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TimerHiddenActionLog>
 *
 * @method        TimerHiddenActionLog   create(array|callable $attributes = [])
 * @method static TimerHiddenActionLog   createOne(array $attributes = [])
 * @method static TimerHiddenActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TimerHiddenActionLog[] createSequence(iterable|callable $sequence)
 */
class TimerHiddenActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return TimerHiddenActionLog::class;
    }
}
