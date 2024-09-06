<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Objects\ExtensionHomeActionWithPartyId;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ExtensionHomeActionWithPartyId>
 *
 * @method        ExtensionHomeActionWithPartyId   create(array|callable $attributes = [])
 * @method static ExtensionHomeActionWithPartyId   createOne(array $attributes = [])
 * @method static ExtensionHomeActionWithPartyId[] createMany(int $number, array|callable $attributes = [])
 * @method static ExtensionHomeActionWithPartyId[] createSequence(iterable|callable $sequence)
 */
final class ExtensionHomeActionWithPartyIdFactory extends ObjectFactory
{
    public static function class(): string
    {
        return ExtensionHomeActionWithPartyId::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'badge' => self::faker()->optional()->randomDigit(),
            'description' => self::faker()->sentence(),
            'extensionPartyId' => self::faker()->word(),
            'icon' => self::faker()->word(),
            'slug' => self::faker()->uuid(),
            'title' => self::faker()->sentence(),
        ];
    }
}
