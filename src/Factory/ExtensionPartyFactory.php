<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Enums\ExtensionMode;
use Fake\ChasterObjects\Objects\ExtensionParty;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ExtensionParty>
 *
 * @method        ExtensionParty   create(array|callable $attributes = [])
 * @method static ExtensionParty   createOne(array $attributes = [])
 * @method static ExtensionParty[] createMany(int $number, array|callable $attributes = [])
 * @method static ExtensionParty[] createSequence(iterable|callable $sequence)
 */
final class ExtensionPartyFactory extends ObjectFactory
{
    public static function class(): string
    {
        return ExtensionParty::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'config' => [],
            'createdAt' => self::faker()->dateTime(),
            'displayName' => self::faker()->word(),
            'extensionPartyId' => self::faker()->uuid(),
            'icon' => self::faker()->optional()->word(),
            'mode' => self::faker()->randomElement(ExtensionMode::cases()),
            'nbActionsRemaining' => self::faker()->numberBetween(-1, 10),
            'nextActionDate' => self::faker()->optional()->dateTime(),
            'regularity' => self::faker()->numberBetween(60, 86400),
            'slug' => self::faker()->word(),
            'subtitle' => self::faker()->sentence(),
            'summary' => self::faker()->sentence(),
            'updatedAt' => self::faker()->dateTime(),
        ];
    }
}
