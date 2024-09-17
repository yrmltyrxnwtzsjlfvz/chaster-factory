<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Objects\Extension\Task\Task;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Task>
 *
 * @method        Task   create(array|callable $attributes = [])
 * @method static Task   createOne(array $attributes = [])
 * @method static Task[] createMany(int $number, array|callable $attributes = [])
 * @method static Task[] createSequence(iterable|callable $sequence)
 */
final class TaskFactory extends ObjectFactory
{
    public static function class(): string
    {
        return Task::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'task' => self::faker()->sentence(),
            'points' => self::faker()->randomDigit(),
        ];
    }
}
