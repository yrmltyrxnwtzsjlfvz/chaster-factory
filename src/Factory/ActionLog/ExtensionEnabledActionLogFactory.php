<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\ExtensionEnabledActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ExtensionEnabledActionLog>
 *
 * @method        ExtensionEnabledActionLog   create(array|callable $attributes = [])
 * @method static ExtensionEnabledActionLog   createOne(array $attributes = [])
 * @method static ExtensionEnabledActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static ExtensionEnabledActionLog[] createSequence(iterable|callable $sequence)
 */
class ExtensionEnabledActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return ExtensionEnabledActionLog::class;
    }
}
