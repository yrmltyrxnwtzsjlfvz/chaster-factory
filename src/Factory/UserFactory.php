<?php

namespace Fake\ChasterFactory\Factory;

use Fake\ChasterObjects\Enums\ProfileRole;
use Fake\ChasterObjects\Objects\User;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<User>
 *
 * @method        User   create(array|callable $attributes = [])
 * @method static User   createOne(array $attributes = [])
 * @method static User[] createMany(int $number, array|callable $attributes = [])
 * @method static User[] createSequence(iterable|callable $sequence)
 */
final class UserFactory extends ObjectFactory
{
    public static function class(): string
    {
        return User::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'id' => self::faker()->md5(),
            'avatarUrl' => self::faker()->url(),
            'disabled' => self::faker()->boolean(),
            'newMember' => self::faker()->boolean(),
            'role' => self::faker()->randomElement(ProfileRole::cases()),
            'suspended' => self::faker()->boolean(),
            'suspendedOrDisabled' => self::faker()->boolean(),
            'username' => self::faker()->userName(),
        ];
    }

    public static function createOneWearer(array $attributes = []): User
    {
        return UserFactory::createOne(['role' => ProfileRole::WEARER]);
    }
}
