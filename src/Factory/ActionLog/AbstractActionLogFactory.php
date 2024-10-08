<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterFactory\Factory\UserFactory;
use Fake\ChasterObjects\Enums\ActionLogRole;
use Fake\ChasterObjects\Enums\ChasterExtension;
use Fake\ChasterObjects\Objects\Lock\ActionLog\AbstractActionLog;
use Zenstruck\Foundry\ObjectFactory;

abstract class AbstractActionLogFactory extends ObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        /** @var ActionLogRole $role */
        $role = self::faker()->randomElement(ActionLogRole::cases());

        return [
            'id' => self::faker()->slug(),
            'lock' => self::faker()->slug(),
            'role' => $role,
            'title' => self::faker()->sentence(),
            'description' => self::faker()->sentence(),
            'color' => self::faker()->optional()->hexColor(),
            'createdAt' => self::faker()->dateTime(),
            'icon' => self::faker()->optional()->randomElement(ChasterExtension::cases())?->getIcon(),
            'prefix' => self::faker()->slug(),
            'user' => !$role->equals(ActionLogRole::EXTENSION) ? UserFactory::new() : null,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            ->afterInstantiate(function (AbstractActionLog $actionLog): void {
                if (is_null($actionLog->getExtension())) {
                    $actionLog->setExtension(self::faker()->optional()->randomElement(ChasterExtension::values()));
                }

                if (is_null($actionLog->getType())) {
                    $actionLog->setExtension(self::faker()->slug());
                }
            });
    }
}
