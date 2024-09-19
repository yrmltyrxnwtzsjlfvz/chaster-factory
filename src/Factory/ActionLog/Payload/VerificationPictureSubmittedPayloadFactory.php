<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\VerificationPictureSubmittedPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<VerificationPictureSubmittedPayload>
 *
 * @method        VerificationPictureSubmittedPayload   create(array|callable $attributes = [])
 * @method static VerificationPictureSubmittedPayload   createOne(array $attributes = [])
 * @method static VerificationPictureSubmittedPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static VerificationPictureSubmittedPayload[] createSequence(iterable|callable $sequence)
 */
final class VerificationPictureSubmittedPayloadFactory extends ObjectFactory
{
    public static function class(): string
    {
        return VerificationPictureSubmittedPayload::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'imageFile' => self::faker()->slug(),
            'verificationCode' => self::faker()->slug(),
        ];
    }
}
