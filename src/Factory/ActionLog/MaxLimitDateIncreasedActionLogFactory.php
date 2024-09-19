<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\MaxLimitIncreasedPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\MaxLimitDateIncreasedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<MaxLimitDateIncreasedActionLog>
 *
 * @method        MaxLimitDateIncreasedActionLog   create(array|callable $attributes = [])
 * @method static MaxLimitDateIncreasedActionLog   createOne(array $attributes = [])
 * @method static MaxLimitDateIncreasedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static MaxLimitDateIncreasedActionLog[] createSequence(iterable|callable $sequence)
 */
final class MaxLimitDateIncreasedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return MaxLimitDateIncreasedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => MaxLimitIncreasedPayloadFactory::new(),
        ]);
    }
}
