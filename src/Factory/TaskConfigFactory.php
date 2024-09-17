<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Objects\Extension\Task\Config;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Config>
 *
 * @method        Config   create(array|callable $attributes = [])
 * @method static Config   createOne(array $attributes = [])
 * @method static Config[] createMany(int $number, array|callable $attributes = [])
 * @method static Config[] createSequence(iterable|callable $sequence)
 */
final class TaskConfigFactory extends ObjectFactory
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
            'tasks' => TaskFactory::createMany(3),
            'points' => self::faker()->boolean(),
            'pointsRequired' => self::faker()->randomDigit(),
            'allowWearerToEditTasks' => self::faker()->boolean(),
            'allowWearerToConfigureTasks' => self::faker()->boolean(),
            'preventWearerFromAssigningTasks' => self::faker()->boolean(),
            'allowWearerToChooseTasks' => self::faker()->boolean(),
            'actionsOnAbandonedTask' => PunishmentFactory::createMany(3),
        ];
    }
}
