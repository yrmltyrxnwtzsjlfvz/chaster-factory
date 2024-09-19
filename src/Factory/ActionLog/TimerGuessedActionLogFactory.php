<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TimerGuessedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TimerGuessedActionLog>
 *
 * @method        TimerGuessedActionLog   create(array|callable $attributes = [])
 * @method static TimerGuessedActionLog   createOne(array $attributes = [])
 * @method static TimerGuessedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TimerGuessedActionLog[] createSequence(iterable|callable $sequence)
 */
class TimerGuessedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return TimerGuessedActionLog::class;
    }
}
