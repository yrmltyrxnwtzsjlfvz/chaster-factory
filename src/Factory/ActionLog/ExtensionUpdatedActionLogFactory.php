<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\ExtensionUpdatedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ExtensionUpdatedActionLog>
 *
 * @method        ExtensionUpdatedActionLog   create(array|callable $attributes = [])
 * @method static ExtensionUpdatedActionLog   createOne(array $attributes = [])
 * @method static ExtensionUpdatedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static ExtensionUpdatedActionLog[] createSequence(iterable|callable $sequence)
 */
class ExtensionUpdatedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return ExtensionUpdatedActionLog::class;
    }
}
