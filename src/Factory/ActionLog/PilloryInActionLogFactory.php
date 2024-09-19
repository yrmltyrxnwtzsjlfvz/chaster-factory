<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\PilloryInPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\PilloryInActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<PilloryInActionLog>
 *
 * @method        PilloryInActionLog   create(array|callable $attributes = [])
 * @method static PilloryInActionLog   createOne(array $attributes = [])
 * @method static PilloryInActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static PilloryInActionLog[] createSequence(iterable|callable $sequence)
 */
final class PilloryInActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return PilloryInActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => PilloryInPayloadFactory::new(),
        ]);
    }
}
