<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Enums\ChasterKeyholderActions;
use Fake\ChasterObjects\Objects\Extension\Penalty\Punishment;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Punishment>
 *
 * @method        Punishment   create(array|callable $attributes = [])
 * @method static Punishment   createOne(array $attributes = [])
 * @method static Punishment[] createMany(int $number, array|callable $attributes = [])
 * @method static Punishment[] createSequence(iterable|callable $sequence)
 */
final class PunishmentFactory extends ObjectFactory
{
    public static function class(): string
    {
        return Punishment::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->randomElement([ChasterKeyholderActions::TIME, ChasterKeyholderActions::FREEZE, ChasterKeyholderActions::PILLORY])->value,
            'params' => [],
        ];
    }
}
