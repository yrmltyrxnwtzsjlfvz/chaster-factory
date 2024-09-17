<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Enums\VerificationPictureVisibility;
use Fake\ChasterObjects\Objects\Extension\VerificationPicture\Config;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Config>
 *
 * @method        Config   create(array|callable $attributes = [])
 * @method static Config   createOne(array $attributes = [])
 * @method static Config[] createMany(int $number, array|callable $attributes = [])
 * @method static Config[] createSequence(iterable|callable $sequence)
 */
final class VerificationPictureConfigFactory extends ObjectFactory
{
    public static function class(): string
    {
        return Config::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            '$visibility' => self::faker()->randomElement(VerificationPictureVisibility::cases()),
            '$peerVerification' => PeerVerificationFactory::createOne(),
        ];
    }
}
