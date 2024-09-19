<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\ActionLog\Payload\VerificationPictureSubmittedPayloadFactory;
use Fake\ChasterObjects\Objects\Lock\ActionLog\VerificationPictureSubmittedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<VerificationPictureSubmittedActionLog>
 *
 * @method        VerificationPictureSubmittedActionLog   create(array|callable $attributes = [])
 * @method static VerificationPictureSubmittedActionLog   createOne(array $attributes = [])
 * @method static VerificationPictureSubmittedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static VerificationPictureSubmittedActionLog[] createSequence(iterable|callable $sequence)
 */
final class VerificationPictureSubmittedActionLogFactory extends AbstractActionLogFactory
{
    public static function class(): string
    {
        return VerificationPictureSubmittedActionLog::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return array_merge(parent::defaults(), [
            'payload' => VerificationPictureSubmittedPayloadFactory::new(),
        ]);
    }
}
