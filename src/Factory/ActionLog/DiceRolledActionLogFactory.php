<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\DicePayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\DiceRolledActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<DiceRolledActionLog>
 *
 * @method        DiceRolledActionLog   create(array|callable $attributes = [])
 * @method static DiceRolledActionLog   createOne(array $attributes = [])
 * @method static DiceRolledActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static DiceRolledActionLog[] createSequence(iterable|callable $sequence)
 */
final class DiceRolledActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return DiceRolledActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => DicePayloadFactory::new(),
        ]);
    }
}
