<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TimerRevealedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TimerRevealedActionLog>
 *
 * @method        TimerRevealedActionLog   create(array|callable $attributes = [])
 * @method static TimerRevealedActionLog   createOne(array $attributes = [])
 * @method static TimerRevealedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TimerRevealedActionLog[] createSequence(iterable|callable $sequence)
 */
class TimerRevealedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return TimerRevealedActionLog::class;
    }
}
