<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\TemporaryOpeningLockedPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\TemporaryOpeningLockedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<TemporaryOpeningLockedActionLog>
 *
 * @method        TemporaryOpeningLockedActionLog   create(array|callable $attributes = [])
 * @method static TemporaryOpeningLockedActionLog   createOne(array $attributes = [])
 * @method static TemporaryOpeningLockedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static TemporaryOpeningLockedActionLog[] createSequence(iterable|callable $sequence)
 */
class TemporaryOpeningLockedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return TemporaryOpeningLockedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => TemporaryOpeningLockedPayloadFactory::new(),
        ]);
    }
}
