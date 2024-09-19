<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\CustomActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<CustomActionLog>
 *
 * @method        CustomActionLog   create(array|callable $attributes = [])
 * @method static CustomActionLog   createOne(array $attributes = [])
 * @method static CustomActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static CustomActionLog[] createSequence(iterable|callable $sequence)
 */
class CustomActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return CustomActionLog::class;
    }
}
