<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\TimeAddedPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\PilloryOutActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<PilloryOutActionLog>
 *
 * @method        PilloryOutActionLog   create(array|callable $attributes = [])
 * @method static PilloryOutActionLog   createOne(array $attributes = [])
 * @method static PilloryOutActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static PilloryOutActionLog[] createSequence(iterable|callable $sequence)
 */
final class PilloryOutActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return PilloryOutActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => TimeAddedPayloadFactory::new(),
        ]);
    }
}
