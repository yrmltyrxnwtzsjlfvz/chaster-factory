<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\KeyholderTrustedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<KeyholderTrustedActionLog>
 *
 * @method        KeyholderTrustedActionLog   create(array|callable $attributes = [])
 * @method static KeyholderTrustedActionLog   createOne(array $attributes = [])
 * @method static KeyholderTrustedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static KeyholderTrustedActionLog[] createSequence(iterable|callable $sequence)
 */
class KeyholderTrustedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return KeyholderTrustedActionLog::class;
    }
}
