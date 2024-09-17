<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Objects\Extension\TemporaryOpening\Config;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Config>
 *
 * @method        Config   create(array|callable $attributes = [])
 * @method static Config   createOne(array $attributes = [])
 * @method static Config[] createMany(int $number, array|callable $attributes = [])
 * @method static Config[] createSequence(iterable|callable $sequence)
 */
final class TemporaryOpeningConfigFactory extends ObjectFactory
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
            'openingTime' => self::faker()->numberBetween(60, 3600),
            'penaltyTime' => self::faker()->numberBetween(60, 3600),
            'keyholderOpenOnly' => self::faker()->boolean(),
        ];
    }
}
