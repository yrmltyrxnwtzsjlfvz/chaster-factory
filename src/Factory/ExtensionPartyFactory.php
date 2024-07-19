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
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return ExtensionParty::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'config' => null, // TODO add value manually
            'createdAt' => null, // TODO add value manually
            'displayName' => null, // TODO add value manually
            'extensionPartyId' => null, // TODO add value manually
            'icon' => null, // TODO add value manually
            'mode' => self::faker()->randomElement(ExtensionMode::cases()),
            'nbActionsRemaining' => null, // TODO add value manually
            'nextActionDate' => null, // TODO add value manually
            'regularity' => null, // TODO add value manually
            'slug' => null, // TODO add value manually
            'subtitle' => null, // TODO add value manually
            'summary' => null, // TODO add value manually
            'updatedAt' => null, // TODO add value manually
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(ExtensionParty $extensionParty): void {})
        ;
    }
}
