<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TemporaryOpeningLockedLateActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TemporaryOpeningLockedLateActionLog>
 *
 * @method        TemporaryOpeningLockedLateActionLog   create(array|callable $attributes = [])
 * @method static TemporaryOpeningLockedLateActionLog   createOne(array $attributes = [])
 * @method static TemporaryOpeningLockedLateActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TemporaryOpeningLockedLateActionLog[] createSequence(iterable|callable $sequence)
 */
final class TemporaryOpeningLockedLateActionLogFactory extends TemporaryOpeningLockedActionLogFactory
{
    public static function class(): string
    {
        return TemporaryOpeningLockedLateActionLog::class;
    }
}
