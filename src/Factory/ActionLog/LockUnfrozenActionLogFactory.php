<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\LockUnfrozenActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<LockUnfrozenActionLog>
 *
 * @method        LockUnfrozenActionLog   create(array|callable $attributes = [])
 * @method static LockUnfrozenActionLog   createOne(array $attributes = [])
 * @method static LockUnfrozenActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static LockUnfrozenActionLog[] createSequence(iterable|callable $sequence)
 */
class LockUnfrozenActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return LockUnfrozenActionLog::class;
    }
}
