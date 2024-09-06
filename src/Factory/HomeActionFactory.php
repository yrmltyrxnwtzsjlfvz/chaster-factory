<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Objects\Extension\Partner\HomeAction;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<HomeAction>
 *
 * @method        HomeAction   create(array|callable $attributes = [])
 * @method static HomeAction   createOne(array $attributes = [])
 * @method static HomeAction[] createMany(int $number, array|callable $attributes = [])
 * @method static HomeAction[] createSequence(iterable|callable $sequence)
 */
final class HomeActionFactory extends ObjectFactory
{
    public static function class(): string
    {
        return HomeAction::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'badge' => self::faker()->optional()->randomDigit(),
            'description' => self::faker()->sentence(),
            'icon' => self::faker()->word(),
            'slug' => self::faker()->uuid(),
            'title' => self::faker()->sentence(),
        ];
    }
}
