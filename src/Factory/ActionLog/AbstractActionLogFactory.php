<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\UserFactory;
use Fake\ChasterObjects\Enums\ActionLogRole;
use Fake\ChasterObjects\Enums\ChasterExtension;
use Zenstruck\Foundry\ObjectFactory;

abstract class AbstractActionLogFactory extends ObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        /** @var ActionLogRole $role */
        $role = self::faker()->randomElement(ActionLogRole::values());

        return [
            'id' => self::faker()->slug(),
            'type' => self::faker()->slug(),
            'lock' => self::faker()->slug(),
            'role' => $role,
            'extension' => self::faker()->optional()->randomElement(ChasterExtension::values()),
            'title' => self::faker()->sentence(),
            'description' => self::faker()->sentence(),
            'color' => self::faker()->optional()->hexColor(),
            'createdAt' => self::faker()->dateTime(),
            'icon' => self::faker()->optional()->randomElement(ChasterExtension::cases())?->getIcon(),
            'prefix' => self::faker()->slug(),
            'user' => !$role->equals(ActionLogRole::EXTENSION) ? UserFactory::new() : null,
        ];
    }
}
