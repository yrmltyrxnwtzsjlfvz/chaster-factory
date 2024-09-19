<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\ActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ActionLog>
 *
 * @method        ActionLog   create(array|callable $attributes = [])
 * @method static ActionLog   createOne(array $attributes = [])
 * @method static ActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static ActionLog[] createSequence(iterable|callable $sequence)
 */
class ActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return ActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => null,
        ]);
    }
}
