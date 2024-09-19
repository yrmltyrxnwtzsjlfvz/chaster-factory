<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\LockFrozenActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<LockFrozenActionLog>
 *
 * @method        LockFrozenActionLog   create(array|callable $attributes = [])
 * @method static LockFrozenActionLog   createOne(array $attributes = [])
 * @method static LockFrozenActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static LockFrozenActionLog[] createSequence(iterable|callable $sequence)
 */
class LockFrozenActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return LockFrozenActionLog::class;
    }
}
