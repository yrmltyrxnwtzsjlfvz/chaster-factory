<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\TemporaryOpeningOpenedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TemporaryOpeningOpenedActionLog>
 *
 * @method        TemporaryOpeningOpenedActionLog   create(array|callable $attributes = [])
 * @method static TemporaryOpeningOpenedActionLog   createOne(array $attributes = [])
 * @method static TemporaryOpeningOpenedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TemporaryOpeningOpenedActionLog[] createSequence(iterable|callable $sequence)
 */
class TemporaryOpeningOpenedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return TemporaryOpeningOpenedActionLog::class;
    }
}
