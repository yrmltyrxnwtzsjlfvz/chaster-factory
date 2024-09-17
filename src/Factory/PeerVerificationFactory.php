<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Objects\Extension\VerificationPicture\PeerVerification;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<PeerVerification>
 *
 * @method        PeerVerification   create(array|callable $attributes = [])
 * @method static PeerVerification   createOne(array $attributes = [])
 * @method static PeerVerification[] createMany(int $number, array|callable $attributes = [])
 * @method static PeerVerification[] createSequence(iterable|callable $sequence)
 */
final class PeerVerificationFactory extends ObjectFactory
{
    public static function class(): string
    {
        return PeerVerification::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'enabled' => self::faker()->boolean(),
            'punishments' => PunishmentFactory::createMany(3),
        ];
    }
}
