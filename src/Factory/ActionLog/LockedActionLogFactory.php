<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\LockedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<LockedActionLog>
 *
 * @method        LockedActionLog   create(array|callable $attributes = [])
 * @method static LockedActionLog   createOne(array $attributes = [])
 * @method static LockedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static LockedActionLog[] createSequence(iterable|callable $sequence)
 */
class LockedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return LockedActionLog::class;
    }
}
