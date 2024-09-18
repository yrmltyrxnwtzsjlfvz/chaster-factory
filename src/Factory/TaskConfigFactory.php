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
            'tasks' => TaskFactory::createMany(self::faker()->randomDigit()),
            'points' => self::faker()->boolean(),
            'pointsRequired' => self::faker()->randomDigit() + 1,
            'wearerAllowedToEditTasks' => self::faker()->boolean(),
            'wearerAllowedToConfigureTasks' => self::faker()->boolean(),
            'wearerPreventedFromAssigningTasks' => self::faker()->boolean(),
            'wearerAllowedToChooseTasks' => self::faker()->boolean(),
            'actionsOnAbandonedTask' => PunishmentFactory::createMany(3),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            ->afterInstantiate(function (Config $lock): void {
                if ($lock->hasPoints()) {
                    if (empty($lock->getPointsRequired())) {
                        $lock->setPointsRequired(self::faker()->randomDigit() + 1);
                    }
                } else {
                    $lock->setPointsRequired(0);
                }

                if ($lock->isWearerAllowedToChooseTasks() && $lock->isWearerPreventedFromAssigningTasks()) {
                    $lock->setWearerPreventedFromAssigningTasks(false);
                }
            });
    }
}
