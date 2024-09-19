<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\MaxLimitDateRemovedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<MaxLimitDateRemovedActionLog>
 *
 * @method        MaxLimitDateRemovedActionLog   create(array|callable $attributes = [])
 * @method static MaxLimitDateRemovedActionLog   createOne(array $attributes = [])
 * @method static MaxLimitDateRemovedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static MaxLimitDateRemovedActionLog[] createSequence(iterable|callable $sequence)
 */
class MaxLimitDateRemovedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return MaxLimitDateRemovedActionLog::class;
    }
}
