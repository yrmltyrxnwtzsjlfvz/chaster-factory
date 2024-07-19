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
        return ExtensionHomeActionWithPartyId::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'badge' => null, // TODO add value manually
            'description' => null, // TODO add value manually
            'extensionPartyId' => null, // TODO add value manually
            'icon' => null, // TODO add value manually
            'slug' => null, // TODO add value manually
            'title' => null, // TODO add value manually
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(ExtensionHomeActionWithPartyId $extensionHomeActionWithPartyId): void {})
        ;
    }
}
