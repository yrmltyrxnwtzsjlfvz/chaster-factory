<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\LinkTimeChangedPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\LinkTimeChangedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<LinkTimeChangedActionLog>
 *
 * @method        LinkTimeChangedActionLog   create(array|callable $attributes = [])
 * @method static LinkTimeChangedActionLog   createOne(array $attributes = [])
 * @method static LinkTimeChangedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static LinkTimeChangedActionLog[] createSequence(iterable|callable $sequence)
 */
final class LinkTimeChangedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return LinkTimeChangedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => LinkTimeChangedPayloadFactory::new(),
        ]);
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(LinkTimeChangedActionLog $linkTimeChangedActionLog): void {})
        ;
    }
}
