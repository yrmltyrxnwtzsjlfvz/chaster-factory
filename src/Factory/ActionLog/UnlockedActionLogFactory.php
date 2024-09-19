<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\UnlockedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<UnlockedActionLog>
 *
 * @method        UnlockedActionLog   create(array|callable $attributes = [])
 * @method static UnlockedActionLog   createOne(array $attributes = [])
 * @method static UnlockedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static UnlockedActionLog[] createSequence(iterable|callable $sequence)
 */
class UnlockedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return UnlockedActionLog::class;
    }
}
