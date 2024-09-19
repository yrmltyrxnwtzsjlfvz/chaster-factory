<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\ExtensionDisabledActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ExtensionDisabledActionLog>
 *
 * @method        ExtensionDisabledActionLog   create(array|callable $attributes = [])
 * @method static ExtensionDisabledActionLog   createOne(array $attributes = [])
 * @method static ExtensionDisabledActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static ExtensionDisabledActionLog[] createSequence(iterable|callable $sequence)
 */
class ExtensionDisabledActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return ExtensionDisabledActionLog::class;
    }
}
