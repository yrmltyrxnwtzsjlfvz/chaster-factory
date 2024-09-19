<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\CombinationVerifiedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<CombinationVerifiedActionLog>
 *
 * @method        CombinationVerifiedActionLog   create(array|callable $attributes = [])
 * @method static CombinationVerifiedActionLog   createOne(array $attributes = [])
 * @method static CombinationVerifiedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static CombinationVerifiedActionLog[] createSequence(iterable|callable $sequence)
 */
class CombinationVerifiedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return CombinationVerifiedActionLog::class;
    }
}
