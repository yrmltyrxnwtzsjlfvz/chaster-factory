<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Enums\ExtensionMode;
use Fake\ChasterObjects\Objects\ExtensionPublic;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ExtensionPublic>
 *
 * @method        ExtensionPublic   create(array|callable $attributes = [])
 * @method static ExtensionPublic   createOne(array $attributes = [])
 * @method static ExtensionPublic[] createMany(int $number, array|callable $attributes = [])
 * @method static ExtensionPublic[] createSequence(iterable|callable $sequence)
 */
final class ExtensionPublicFactory extends ObjectFactory
{
    public static function class(): string
    {
        return ExtensionPublic::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'subtitle' => self::faker()->sentence(),
            'summary' => self::faker()->sentence(),
            'displayName' => self::faker()->sentence(),
            'icon' => self::faker()->slug(),
            'slug' => self::faker()->slug(),
            'availableModes' => self::faker()->randomElements(ExtensionMode::values(), self::faker()->numberBetween(1, count(ExtensionMode::values()))),
            'defaultRegularity' => self::faker()->randomNumber(),
            'enabled' => self::faker()->boolean(),
            'premium' => self::faker()->boolean(),
            'countedInExtensionsLimit' => self::faker()->boolean(),
            'partner' => self::faker()->boolean(),
            'featured' => self::faker()->boolean(),
            'testing' => self::faker()->boolean(),
            'developedByCommunity' => self::faker()->boolean(),
            'actions' => self::faker()->boolean(),
            'configIframeUrl' => self::faker()->optional()->url(),
            'partnerExtensionId' => self::faker()->md5(),
        ];
    }
}
