<?php

namespace Fake\ChasterFactory\Factory;

use DateTimeImmutable;
use Fake\ChasterObjects\Enums\ChasterLockStatus;
use Fake\ChasterObjects\Enums\KeyholderUnavailable;
use Fake\ChasterObjects\Enums\LockRole;
use Fake\ChasterObjects\Objects\Lock;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Lock>
 *
 * @method        Lock   create(array|callable $attributes = [])
 * @method static Lock   createOne(array $attributes = [])
 * @method static Lock[] createMany(int $number, array|callable $attributes = [])
 * @method static Lock[] createSequence(iterable|callable $sequence)
 */
final class LockFactory extends ObjectFactory
{
    public static function class(): string
    {
        return Lock::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        $minDate = self::faker()->dateTimeBetween('-1 years', '+1 years');

        return [
            'id' => self::faker()->md5(),
            'endDate' => self::faker()->dateTimeBetween('-1 years', '+1 years'),
            'title' => self::faker()->sentence(),

            'allowedToViewTime' => self::faker()->boolean(), // TODO add value manually
            'archivedAt' => null, // afterInstantiate
            'availableHomeActions' => [], // TODO add value manually
            'canBeUnlockedByMaxLimitDate' => null, // TODO add value manually
            'createdAt' => null, // TODO add value manually
            'deletedAt' => null, // TODO add value manually
            'displayRemainingTime' => self::faker()->boolean(), // TODO add value manually
            'extensions' => null, // TODO add value manually
            'frozen' => self::faker()->boolean(), // TODO add value manually
            'frozenAt' => null, // afterInstantiate
            'hideTimeLogs' => self::faker()->boolean(), // TODO add value manually
            'keyholder' => null, // TODO add value manually
            'keyholderUnavailable' => null, // afterInstantiate
            'keyholderArchivedAt' => null, // TODO add value manually
            'limitLockTime' => null, // TODO add value manually
            'lockUnlockable' => null, // TODO add value manually
            'maxDate' => self::faker()->dateTimeBetween($minDate->format(DATE_RFC3339), '+1 years'), // TODO add value manually
            'maxLimitDate' => null, // TODO add DateTimeInterface value manually
            'minDate' => $minDate,
            'reasonsPreventingUnlocking' => ReasonPreventingUnlockingFactory::createMany(self::faker()->numberBetween(0, 3)) ?? [], // TODO add value manually
            'role' => self::faker()->randomElement([LockRole::KEYHOLDER, LockRole::WEARER]),
            'sharedLock' => null, // TODO add value manually
            'startDate' => self::faker()->dateTime($minDate),
            'status' => self::faker()->randomElement(ChasterLockStatus::cases()),
            'testLock' => self::faker()->boolean(),
            'totalDuration' => null, // TODO add value manually
            'trusted' => self::faker()->boolean(), // TODO add value manually
            'unlockedAt' => null, // TODO add value manually
            'updatedAt' => null, // TODO add value manually
            'user' => UserFactory::createOne(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            ->afterInstantiate(function (Lock $lock): void {
                $lock->setFrozenAt($lock->isFrozen() ? DateTimeImmutable::createFromMutable(self::faker()->dateTime()) : null)
                    ->setKeyholderUnavailable(!is_null($lock->getKeyholder()) ? self::faker()->optional()->randomElement(KeyholderUnavailable::values()) : null)
                    // ->setEndDate(!is_null($lock->getKeyholder()) ? self::faker()->optional()->randomElement(KeyholderUnavailable::values()) : null)
                ->setArchivedAt($lock->getStatus()->equals(ChasterLockStatus::ARCHIVED) ? self::faker()->dateTime() : null);
            });
    }
}

/*
{
    "_id": "668bed82ccf50dd31fd8882d",
            "startDate": "2024-07-08T13:45:38.000Z",
            "endDate": "2024-07-08T13:52:39.670Z",
            "minDate": "2024-07-08T14:59:59.000Z",
            "maxDate": "2024-07-08T15:38:59.000Z",
            "maxLimitDate": "2024-07-08T16:14:59.000Z",
            "displayRemainingTime": false,
            "limitLockTime": true,
            "status": "unlocked",
            "combination": "668bed825c93568bd9f7c096",
            "sharedLock": {
    "_id": "64b9640cc4ee5d54568a2f0b",
                "minDuration": 3189,
                "maxDuration": 5109,
                "maxLimitDuration": null,
                "minDate": "2024-07-08T17:00:00.000Z",
                "maxDate": "2024-07-08T17:32:00.000Z",
                "maxLimitDate": "2024-07-08T18:15:00.000Z",
                "displayRemainingTime": true,
                "limitLockTime": true,
                "maxLockedUsers": 1,
                "isPublic": false,
                "requireContact": false,
                "name": "Guess the Timer",
                "description": "Just a short lock that requires lots of interaction...",
                "unsplashPhoto": {
        "id": "0vCRW68RYD4",
                    "name": "Gwen Mamanoleas",
                    "url": "https://images.unsplash.com/photo-1616783335083-451a6b9d09fa?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMzE4NDZ8MHwxfGFsbHx8fHx8fHx8fDE3MjA0NTI2MDl8&ixlib=rb-4.0.3&q=80&w=1080",
                    "username": "mamanoleas"
                },
                "hideTimeLogs": false,
                "lastSavedAt": "2024-07-08T16:00:05.497Z",
                "requirePassword": false,
                "user": {
        "_id": "64b9392c8fc3d9c36e9ddd34",
                    "username": "ChastityBot",
                    "isPremium": false,
                    "description": "Do not contact me I will not respond",
                    "location": "",
                    "gender": "",
                    "sexualOrientation": "Unspecified",
                    "age": null,
                    "role": "unspecified",
                    "isFindom": false,
                    "avatarUrl": "https://cdn01.chaster.app/app/uploads/avatars/6kxN9St3fevXlrn2.png",
                    "online": false,
                    "lastSeen": null,
                    "isAdmin": false,
                    "isModerator": false,
                    "metadata": {
            "locktober2020Points": 0,
                        "locktober2021Points": 0,
                        "chastityMonth2022Points": 0,
                        "locktober2022Points": 0,
                        "locktober2023Points": 4180
                    },
                    "fullLocation": "",
                    "discordId": null,
                    "discordUsername": null,
                    "isDisabled": false,
                    "isSuspended": false,
                    "features": [],
                    "joinedAt": "2023-07",
                    "isNewMember": false,
                    "isSuspendedOrDisabled": false
                },
                "durationMode": "date",
                "isFindom": false,
                "createdAt": "2023-07-20T16:42:52.796Z",
                "updatedAt": "2024-07-08T16:00:05.498Z",
                "tags": [
        "Roulette",
        "Gamble",
        "Game",
        "Luck",
        "Punishment"
    ],
                "reasonForPublicHide": "other",
                "calculatedMaxLimitDuration": 7689
            },
            "createdAt": "2024-07-08T13:45:38.323Z",
            "updatedAt": "2024-07-08T14:40:03.721Z",
            "unlockedAt": "2024-07-08T14:39:46.746Z",
            "archivedAt": "2024-07-08T14:39:47.312Z",
            "frozenAt": null,
            "keyholderArchivedAt": "2024-07-08T14:40:03.716Z",
            "totalDuration": 3248746,
            "allowSessionOffer": false,
            "isTestLock": false,
            "offerToken": null,
            "hideTimeLogs": true,
            "trusted": true,
            "user": {
    "_id": "64b85b0059b61b53887a963e",
                "username": "yrmltyrxnwtzsjlfvz",
                "isPremium": false,
                "description": "https://chaster.app/sessions/lA1JRxxg1CRxRKSy",
                "location": "",
                "gender": "",
                "sexualOrientation": "Unspecified",
                "age": null,
                "role": "unspecified",
                "isFindom": false,
                "avatarUrl": "https://api.chaster.app/users/avatar/default_avatar.jpg",
                "online": false,
                "lastSeen": null,
                "isAdmin": false,
                "isModerator": false,
                "metadata": {
        "locktober2020Points": 0,
                    "locktober2021Points": 0,
                    "chastityMonth2022Points": 0,
                    "locktober2022Points": 0,
                    "locktober2023Points": 8970
                },
                "fullLocation": "",
                "discordId": null,
                "discordUsername": null,
                "isDisabled": false,
                "isSuspended": false,
                "features": [],
                "joinedAt": "2023-07",
                "isNewMember": false,
                "isSuspendedOrDisabled": false
            },
            "keyholder": {
    "_id": "64b9392c8fc3d9c36e9ddd34",
                "username": "ChastityBot",
                "isPremium": false,
                "description": "Do not contact me I will not respond",
                "location": "",
                "gender": "",
                "sexualOrientation": "Unspecified",
                "age": null,
                "role": "unspecified",
                "isFindom": false,
                "avatarUrl": "https://cdn01.chaster.app/app/uploads/avatars/6kxN9St3fevXlrn2.png",
                "online": false,
                "lastSeen": null,
                "isAdmin": false,
                "isModerator": false,
                "metadata": {
        "locktober2020Points": 0,
                    "locktober2021Points": 0,
                    "chastityMonth2022Points": 0,
                    "locktober2022Points": 0,
                    "locktober2023Points": 4180
                },
                "fullLocation": "",
                "discordId": null,
                "discordUsername": null,
                "isDisabled": false,
                "isSuspended": false,
                "features": [],
                "joinedAt": "2023-07",
                "isNewMember": false,
                "isSuspendedOrDisabled": false
            },
            "isAllowedToViewTime": true,
            "canBeUnlocked": false,
            "canBeUnlockedByMaxLimitDate": false,
            "isFrozen": false,
            "extensions": [
                {
                    "slug": "temporary-opening",
                    "displayName": "Hygiene opening",
                    "summary": "Because hygiene is important, unlock yourself regularly to clean your chastity device. Be careful, if you exceed the allowed time, you will receive a penalty.",
                    "subtitle": "Temporarily unlock yourself",
                    "icon": "soap",
                    "_id": "668bed82ccf50dd31fd88848",
                    "config": {
                    "openingTime": 900,
                        "penaltyTime": 1800,
                        "allowOnlyKeyholderToOpen": false
                    },
                    "mode": "non_cumulative",
                    "regularity": 3600,
                    "userData": {
                    "openedAt": null
                    },
                    "nbActionsRemaining": 1,
                    "nextActionDate": "2024-07-08T14:45:38.323Z",
                    "isPartner": false,
                    "textConfig": "Time allowed: 15 minutes, penalty for exceeding time: 30 minutes",
                    "createdAt": "2024-07-08T13:45:38.494Z",
                    "updatedAt": "2024-07-08T13:45:38.618Z"
                },
                {
                    "slug": "guess-timer",
                    "displayName": "Guess the Timer",
                    "summary": "Guess correctly the timer, or time is added. The timer is hidden, press the unlock button when you think the timer is finished. If the timer is still running, random time is added!",
                    "subtitle": "With the timer hidden, guess when you think the timer is finished",
                    "icon": "clock",
                    "_id": "668bed82ccf50dd31fd8884c",
                    "config": {
                    "minRandomTime": 60,
                        "maxRandomTime": 120
                    },
                    "mode": "unlimited",
                    "regularity": 3600,
                    "userData": null,
                    "nbActionsRemaining": -1,
                    "isPartner": false,
                    "textConfig": "Random time between 1 minute and 2 minutes",
                    "createdAt": "2024-07-08T13:45:38.494Z",
                    "updatedAt": "2024-07-08T14:37:49.315Z"
                },
                {
                    "slug": "better-dice",
                    "displayName": "Better Dice",
                    "summary": "Fully configurable to allow for up to 20 sided dice, set the weights on what the time removal/penalty is, hide the results for hidden timer locks, set a minimum number of rolls before the lock can be unlocked, rig the dice to ensure the lockee has a harder time winning, and the keyholder can even roll for you.",
                    "subtitle": "A slightly more evil take on dice rolling",
                    "icon": "puzzle-piece",
                    "_id": "668bed82ccf50dd31fd8884e",
                    "config": {
                    "slug": "better-dice",
                        "keyholderDice": 1,
                        "wearerDice": 5,
                        "keyholderSides": 15,
                        "wearerSides": 10,
                        "time": "P0Y0M0DT0H5M0S",
                        "winMultiplier": 0.75,
                        "loseMultiplier": 1.1,
                        "skipTies": true,
                        "penalty": true,
                        "eventsRequiredPerPeriod": 3,
                        "penaltyPeriod": "P0Y0M0DT1H0M0S",
                        "penaltyAddTime": "P0Y0M0DT1H0M0S",
                        "penaltyFreeze": true,
                        "penaltyPilloryLength": "P0Y0M0DT0H15M0S",
                        "penaltyMultiplier": true,
                        "penaltyMultiplierPer": 1.1,
                        "minimumEventsToUnlock": 2,
                        "rigKeyholderDice": false,
                        "rigWearerDice": false,
                        "invisibleDiceIfTimerHidden": false,
                        "invisibleDice": true,
                        "sides": 6,
                        "timeSeconds": 300,
                        "extraKeyholderDiceOdds": 5,
                        "fewerWearerDiceOdds": 5,
                        "freezeOnWearerLossOdds": 5
                    },
                    "mode": "cumulative",
                    "regularity": 300,
                    "userData": null,
                    "nbActionsRemaining": 18,
                    "isPartner": true,
                    "textConfig": "- Extension rolls 15 sided dice, wearer rolls 5x10 sided dice\n- Time added is total difference between rolls * time * 110.00000000000001%\n- Time removed is total difference between rolls * time * 75%\n\n- Wearer will not see the roll results unless it is a tie\n- Ties can be immediately re-rolled\n- Dice roll results are hidden\n- 2 dice rolls required to unlock\n#### Penalties\n- Must roll the dice 3 times every X\n##### Penalty for not rolling the dice in time\n- Add X  * missed rolls * 1.1\n* Freeze the lock\n- Pillory for X  * missed rolls * 1.1\n",
                    "createdAt": "2024-07-08T13:45:38.494Z",
                    "updatedAt": "2024-07-08T14:37:42.347Z"
                },
                {
                    "slug": "pillory",
                    "displayName": "Pillory",
                    "summary": "When you receive a penalty, be displayed publicly for a specified period of time. Other users will be able to add time to your lock.",
                    "subtitle": "Be displayed publicly when you receive a penalty",
                    "icon": "user-friends",
                    "_id": "668bed82ccf50dd31fd88846",
                    "config": {
                    "timeToAdd": 60,
                        "limitToLoggedUsers": true
                    },
                    "mode": "unlimited",
                    "regularity": 3600,
                    "userData": null,
                    "nbActionsRemaining": -1,
                    "isPartner": false,
                    "textConfig": "1 minute added per vote",
                    "createdAt": "2024-07-08T13:45:38.494Z",
                    "updatedAt": "2024-07-08T13:45:38.628Z"
                },
                {
                    "slug": "wheel-of-fortune",
                    "displayName": "Wheel of Fortune",
                    "summary": "Turn the wheel of fortune and change the duration of your lock. Configure actions for each cell of the wheel of fortune: time added or removed, frozen timer or custom text for your dares.",
                    "subtitle": "Try your luck by spinning the Wheel of Fortune",
                    "icon": "/static/assets/images/icons/extensions/wheel-of-fortune.svg",
                    "_id": "668bed82ccf50dd31fd8884a",
                    "config": {
                    "segments": [
                            {
                                "type": "add-time",
                                "text": "",
                                "duration": 60
                            },
                            {
                                "type": "add-remove-time",
                                "text": "",
                                "duration": 300
                            },
                            {
                                "type": "freeze",
                                "duration": 3600,
                                "text": ""
                            },
                            {
                                "type": "remove-time",
                                "duration": 300,
                                "text": ""
                            },
                            {
                                "type": "add-remove-time",
                                "duration": 600,
                                "text": ""
                            },
                            {
                                "type": "pillory",
                                "duration": 900,
                                "text": ""
                            }
                        ]
                    },
                    "mode": "cumulative",
                    "regularity": 900,
                    "userData": null,
                    "nbActionsRemaining": 6,
                    "isPartner": false,
                    "textConfig": "Add 1 minute, Add or remove 5 minutes, Freeze / unfreeze, Remove 5 minutes, Add or remove 10 minutes, Pillory for 15 minutes",
                    "createdAt": "2024-07-08T13:45:38.494Z",
                    "updatedAt": "2024-07-08T14:33:48.255Z"
                },
                {
                    "slug": "link",
                    "displayName": "Share links",
                    "summary": "Share a link to other people to ask them to add or remove time to your lock.",
                    "subtitle": "Share your lock with others",
                    "icon": "link",
                    "_id": "668bed82ccf50dd31fd88844",
                    "config": {
                    "timeToAdd": 300,
                        "timeToRemove": 60,
                        "enableRandom": true,
                        "nbVisits": 0,
                        "limitToLoggedUsers": false
                    },
                    "mode": "unlimited",
                    "regularity": 3600,
                    "userData": null,
                    "nbActionsRemaining": -1,
                    "isPartner": false,
                    "textConfig": "Time to add: 5 minutes, Time to remove: 1 minute",
                    "createdAt": "2024-07-08T13:45:38.493Z",
                    "updatedAt": "2024-07-08T13:45:38.652Z"
                }
            ],
            "role": "keyholder",
            "title": "Guess the Timer",
            "lastVerificationPicture": null,
            "reasonsPreventingUnlocking": [],
            "extensionsAllowUnlocking": true
        },

{
    "_id": "668c290ce63ab5da9441559b",
            "startDate": "2024-07-08T17:59:40.000Z",
            "endDate": "2024-07-08T19:08:27.000Z",
            "minDate": "2024-07-08T18:59:59.000Z",
            "maxDate": "2024-07-08T19:29:59.000Z",
            "maxLimitDate": "2024-07-08T20:14:59.000Z",
            "displayRemainingTime": true,
            "limitLockTime": true,
            "status": "locked",
            "combination": "668c290cccf50dd31f76063b",
            "sharedLock": {
    "_id": "668bfc6d50aa54e6959a2b92",
                "minDuration": 3546,
                "maxDuration": 5106,
                "maxLimitDuration": null,
                "minDate": "2024-07-08T19:00:00.000Z",
                "maxDate": "2024-07-08T19:26:00.000Z",
                "maxLimitDate": "2024-07-08T20:15:00.000Z",
                "displayRemainingTime": true,
                "limitLockTime": true,
                "maxLockedUsers": 1,
                "isPublic": false,
                "requireContact": false,
                "name": "Gamble With The Hidden Timer",
                "description": "Just a short lock that requires lots of interaction...",
                "unsplashPhoto": {
        "id": "LUaJmZM-LFg",
                    "name": "Artem Labunsky",
                    "url": "https://images.unsplash.com/photo-1579071072964-395e8239d579?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMzE4NDZ8MHwxfGFsbHx8fHx8fHx8fDE3MjA0NjExNzV8&ixlib=rb-4.0.3&q=80&w=1080",
                    "username": "labunsky"
                },
                "hideTimeLogs": false,
                "lastSavedAt": "2024-07-08T18:00:05.509Z",
                "requirePassword": false,
                "user": {
        "_id": "64b9392c8fc3d9c36e9ddd34",
                    "username": "ChastityBot",
                    "isPremium": false,
                    "description": "Do not contact me I will not respond",
                    "location": "",
                    "gender": "",
                    "sexualOrientation": "Unspecified",
                    "age": null,
                    "role": "unspecified",
                    "isFindom": false,
                    "avatarUrl": "https://cdn01.chaster.app/app/uploads/avatars/6kxN9St3fevXlrn2.png",
                    "online": false,
                    "lastSeen": null,
                    "isAdmin": false,
                    "isModerator": false,
                    "metadata": {
            "locktober2020Points": 0,
                        "locktober2021Points": 0,
                        "chastityMonth2022Points": 0,
                        "locktober2022Points": 0,
                        "locktober2023Points": 4180
                    },
                    "fullLocation": "",
                    "discordId": null,
                    "discordUsername": null,
                    "isDisabled": false,
                    "isSuspended": false,
                    "features": [],
                    "joinedAt": "2023-07",
                    "isNewMember": false,
                    "isSuspendedOrDisabled": false
                },
                "durationMode": "date",
                "isFindom": false,
                "createdAt": "2024-07-08T14:49:17.035Z",
                "updatedAt": "2024-07-08T18:00:05.511Z",
                "tags": [
        "Roulette",
        "Gamble",
        "Game",
        "Luck",
        "Punishment"
    ],
                "reasonForPublicHide": "other",
                "calculatedMaxLimitDuration": 8046
            },
            "createdAt": "2024-07-08T17:59:40.609Z",
            "updatedAt": "2024-07-08T18:00:09.385Z",
            "unlockedAt": null,
            "archivedAt": null,
            "frozenAt": null,
            "keyholderArchivedAt": null,
            "totalDuration": 73385,
            "allowSessionOffer": false,
            "isTestLock": false,
            "offerToken": null,
            "hideTimeLogs": false,
            "trusted": true,
            "user": {
    "_id": "64b85b0059b61b53887a963e",
                "username": "yrmltyrxnwtzsjlfvz",
                "isPremium": false,
                "description": "https://chaster.app/sessions/lA1JRxxg1CRxRKSy",
                "location": "",
                "gender": "",
                "sexualOrientation": "Unspecified",
                "age": null,
                "role": "unspecified",
                "isFindom": false,
                "avatarUrl": "https://api.chaster.app/users/avatar/default_avatar.jpg",
                "online": false,
                "lastSeen": null,
                "isAdmin": false,
                "isModerator": false,
                "metadata": {
        "locktober2020Points": 0,
                    "locktober2021Points": 0,
                    "chastityMonth2022Points": 0,
                    "locktober2022Points": 0,
                    "locktober2023Points": 8970
                },
                "fullLocation": "",
                "discordId": null,
                "discordUsername": null,
                "isDisabled": false,
                "isSuspended": false,
                "features": [],
                "joinedAt": "2023-07",
                "isNewMember": false,
                "isSuspendedOrDisabled": false
            },
            "keyholder": {
    "_id": "64b9392c8fc3d9c36e9ddd34",
                "username": "ChastityBot",
                "isPremium": false,
                "description": "Do not contact me I will not respond",
                "location": "",
                "gender": "",
                "sexualOrientation": "Unspecified",
                "age": null,
                "role": "unspecified",
                "isFindom": false,
                "avatarUrl": "https://cdn01.chaster.app/app/uploads/avatars/6kxN9St3fevXlrn2.png",
                "online": false,
                "lastSeen": null,
                "isAdmin": false,
                "isModerator": false,
                "metadata": {
        "locktober2020Points": 0,
                    "locktober2021Points": 0,
                    "chastityMonth2022Points": 0,
                    "locktober2022Points": 0,
                    "locktober2023Points": 4180
                },
                "fullLocation": "",
                "discordId": null,
                "discordUsername": null,
                "isDisabled": false,
                "isSuspended": false,
                "features": [],
                "joinedAt": "2023-07",
                "isNewMember": false,
                "isSuspendedOrDisabled": false
            },
            "isAllowedToViewTime": true,
            "canBeUnlocked": false,
            "canBeUnlockedByMaxLimitDate": false,
            "isFrozen": false,
            "extensions": [
                {
                    "slug": "dice",
                    "displayName": "Dice",
                    "summary": "With every action, you and the bot roll a dice. If you do more than the bot, time is removed. If the bot does more, time is added.",
                    "subtitle": "Roll the dice and try to reduce your time locked",
                    "icon": "dice",
                    "_id": "668c290ce63ab5da944155b8",
                    "config": {
                    "multiplier": 180
                    },
                    "mode": "cumulative",
                    "regularity": 600,
                    "userData": null,
                    "nbActionsRemaining": 1,
                    "isPartner": false,
                    "textConfig": "Time multiplier: 3 minutes",
                    "createdAt": "2024-07-08T17:59:40.735Z",
                    "updatedAt": "2024-07-08T17:59:40.785Z"
                },
                {
                    "slug": "unlock-condition",
                    "displayName": "Unlock Gamble",
                    "summary": "Let chance decide whether the wearer will be unlocked. Or do they need to perform a task first?Options over options...",
                    "subtitle": "Will you be unlocked? Let randomness decide!",
                    "icon": "puzzle-piece",
                    "_id": "668c290ce63ab5da944155b2",
                    "config": {
                    "occasion": "GuessTheTimer",
                        "unlockWeight": 1,
                        "taskWeight": 3,
                        "deniedWeight": 1,
                        "tasks": [
                            {
                                "invalidatedByTime": false,
                                "invalidatedByFrozen": false,
                                "invalidatedByPillory": false,
                                "timeChanged": false,
                                "type": "WOF",
                                "text": "Turn the Wheel of Fortune",
                                "needsDesc": false,
                                "weight": 1
                            },
                            {
                                "invalidatedByTime": false,
                                "invalidatedByFrozen": false,
                                "invalidatedByPillory": false,
                                "timeChanged": false,
                                "type": "Dice",
                                "text": "Roll the dice",
                                "needsDesc": false,
                                "weight": 1
                            }
                        ],
                        "deniedPunishments": [
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddFixed",
                                        "desc": "Add time",
                                        "appliedDesc": "Time has been added!",
                                        "min": 60,
                                        "max": 300
                                    }
                                ]
                            },
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddTotal",
                                        "desc": "Add the duration locked so far",
                                        "appliedDesc": "Time has been added!"
                                    }
                                ]
                            },
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddRemaining",
                                        "desc": "Double the remaining time",
                                        "appliedDesc": "Time has been added!"
                                    }
                                ]
                            },
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddFixed",
                                        "desc": "Add time",
                                        "appliedDesc": "Time has been added!",
                                        "min": 60,
                                        "max": 120
                                    },
                                    {
                                        "type": "Pillory",
                                        "desc": "Pillory",
                                        "appliedDesc": "You have been pilloried!",
                                        "min": 300,
                                        "max": 900
                                    }
                                ]
                            }
                        ],
                        "taskFailedPunishments": [
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddFixed",
                                        "desc": "Add time",
                                        "appliedDesc": "Time has been added!",
                                        "min": 60,
                                        "max": 300
                                    }
                                ]
                            },
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddTotal",
                                        "desc": "Add the duration locked so far",
                                        "appliedDesc": "Time has been added!"
                                    }
                                ]
                            },
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddRemaining",
                                        "desc": "Double the remaining time",
                                        "appliedDesc": "Time has been added!"
                                    }
                                ]
                            },
                            {
                                "weight": 1,
                                "items": [
                                    {
                                        "type": "AddFixed",
                                        "desc": "Add time",
                                        "appliedDesc": "Time has been added!",
                                        "min": 60,
                                        "max": 120
                                    },
                                    {
                                        "type": "Pillory",
                                        "desc": "Pillory",
                                        "appliedDesc": "You have been pilloried!",
                                        "min": 300,
                                        "max": 900
                                    }
                                ]
                            }
                        ],
                        "allowFrozenRelease": false,
                        "enforceMinimumWait": false,
                        "grantOnceElapsed": false,
                        "taskDoublePunishments": true
                    },
                    "mode": "unlimited",
                    "regularity": 3600,
                    "userData": null,
                    "nbActionsRemaining": -1,
                    "nextActionDate": "2024-07-08T18:59:40.609Z",
                    "isPartner": true,
                    "textConfig": "When can ask:\nAnytime (guess the timer)\n\n&nbsp;\n\nOptions:\n- Allow asking when frozen: no\n- Wait for remaining time before requesting again: no\n- Grant unlock once timer elapsed: no\n\n***\n\nPotential outcomes:\n- Unlock (likelihood 1)\n- Denial (likelihood 1)\n- Perform a task (likelihood 3)\n\n\n***\n\nDenial punishments:\n\n- Punishment 1 (likelihood 1)\n  - Add time:\n1 minute\n – \n5 minutes\n- Punishment 2 (likelihood 1)\n  - Add the duration locked so far\n- Punishment 3 (likelihood 1)\n  - Double the remaining time\n- Punishment 4 (likelihood 1)\n  - Add time:\n1 minute\n – \n2 minutes\n  - Pillory:\n5 minutes\n – \n15 minutes\n\n\n***\n\nTasks:\n- Turn the Wheel of Fortune (likelihood 1)\n- Roll the dice (likelihood 1)\n\n&nbsp;\n\nFailed task punishments (double punishment enforced):\n- Punishment 1 (likelihood 1)\n  - Add time:\n1 minute\n – \n5 minutes\n- Punishment 2 (likelihood 1)\n  - Add the duration locked so far\n- Punishment 3 (likelihood 1)\n  - Double the remaining time\n- Punishment 4 (likelihood 1)\n  - Add time:\n1 minute\n – \n2 minutes\n  - Pillory:\n5 minutes\n – \n15 minutes\n",
                    "createdAt": "2024-07-08T17:59:40.735Z",
                    "updatedAt": "2024-07-08T17:59:42.189Z"
                },
                {
                    "slug": "temporary-opening",
                    "displayName": "Hygiene opening",
                    "summary": "Because hygiene is important, unlock yourself regularly to clean your chastity device. Be careful, if you exceed the allowed time, you will receive a penalty.",
                    "subtitle": "Temporarily unlock yourself",
                    "icon": "soap",
                    "_id": "668c290ce63ab5da944155b4",
                    "config": {
                    "openingTime": 900,
                        "penaltyTime": 43200,
                        "allowOnlyKeyholderToOpen": false
                    },
                    "mode": "non_cumulative",
                    "regularity": 172800,
                    "userData": {
                    "openedAt": null
                    },
                    "nbActionsRemaining": 0,
                    "nextActionDate": "2024-07-10T17:59:40.609Z",
                    "isPartner": false,
                    "textConfig": "Time allowed: 15 minutes, penalty for exceeding time: 12 hours",
                    "createdAt": "2024-07-08T17:59:40.735Z",
                    "updatedAt": "2024-07-08T17:59:40.791Z"
                },
                {
                    "slug": "wheel-of-fortune",
                    "displayName": "Wheel of Fortune",
                    "summary": "Turn the wheel of fortune and change the duration of your lock. Configure actions for each cell of the wheel of fortune: time added or removed, frozen timer or custom text for your dares.",
                    "subtitle": "Try your luck by spinning the Wheel of Fortune",
                    "icon": "/static/assets/images/icons/extensions/wheel-of-fortune.svg",
                    "_id": "668c290ce63ab5da944155ba",
                    "config": {
                    "segments": [
                            {
                                "type": "add-time",
                                "duration": 60,
                                "text": ""
                            },
                            {
                                "type": "add-remove-time",
                                "duration": 300,
                                "text": ""
                            },
                            {
                                "type": "pillory",
                                "text": "",
                                "duration": 900
                            },
                            {
                                "type": "remove-time",
                                "text": "",
                                "duration": 300
                            },
                            {
                                "type": "add-remove-time",
                                "duration": 600,
                                "text": ""
                            }
                        ]
                    },
                    "mode": "cumulative",
                    "regularity": 600,
                    "userData": null,
                    "nbActionsRemaining": 1,
                    "isPartner": false,
                    "textConfig": "Add 1 minute, Add or remove 5 minutes, Pillory for 15 minutes, Remove 5 minutes, Add or remove 10 minutes",
                    "createdAt": "2024-07-08T17:59:40.735Z",
                    "updatedAt": "2024-07-08T17:59:40.790Z"
                },
                {
                    "slug": "pillory",
                    "displayName": "Pillory",
                    "summary": "When you receive a penalty, be displayed publicly for a specified period of time. Other users will be able to add time to your lock.",
                    "subtitle": "Be displayed publicly when you receive a penalty",
                    "icon": "user-friends",
                    "_id": "668c290ce63ab5da944155b6",
                    "config": {
                    "timeToAdd": 3600,
                        "limitToLoggedUsers": true
                    },
                    "mode": "unlimited",
                    "regularity": 3600,
                    "userData": null,
                    "nbActionsRemaining": -1,
                    "isPartner": false,
                    "textConfig": "1 hour added per vote",
                    "createdAt": "2024-07-08T17:59:40.735Z",
                    "updatedAt": "2024-07-08T17:59:40.789Z"
                }
            ],
            "role": "keyholder",
            "title": "Gamble With The Hidden Timer",
            "lastVerificationPicture": null,
            "reasonsPreventingUnlocking": [
                {
                    "reason": "Need to beg more",
                    "icon": ""
                }
            ],
            "extensionsAllowUnlocking": false
        }

[
    {
        "_id": "668c290ce63ab5da9441559b",
        "startDate": "2024-07-08T17:59:40.000Z",
        "endDate": null,
        "minDate": "2024-07-08T18:59:59.000Z",
        "maxDate": "2024-07-08T19:29:59.000Z",
        "maxLimitDate": "2024-07-08T20:14:59.000Z",
        "displayRemainingTime": false,
        "limitLockTime": true,
        "status": "locked",
        "combination": "668c290cccf50dd31f76063b",
        "sharedLock": {
        "_id": "668bfc6d50aa54e6959a2b92",
            "minDuration": 3297,
            "maxDuration": 4857,
            "maxLimitDuration": null,
            "minDate": "2024-07-08T19:00:00.000Z",
            "maxDate": "2024-07-08T19:26:00.000Z",
            "maxLimitDate": "2024-07-08T20:15:00.000Z",
            "displayRemainingTime": true,
            "limitLockTime": true,
            "maxLockedUsers": 1,
            "isPublic": false,
            "requireContact": false,
            "name": "Gamble With The Hidden Timer",
            "description": "Just a short lock that requires lots of interaction...",
            "unsplashPhoto": {
            "id": "LUaJmZM-LFg",
                "name": "Artem Labunsky",
                "url": "https://images.unsplash.com/photo-1579071072964-395e8239d579?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMzE4NDZ8MHwxfGFsbHx8fHx8fHx8fDE3MjA0NjExNzV8&ixlib=rb-4.0.3&q=80&w=1080",
                "username": "labunsky"
            },
            "hideTimeLogs": false,
            "lastSavedAt": "2024-07-08T18:00:05.509Z",
            "requirePassword": false,
            "user": {
            "_id": "64b9392c8fc3d9c36e9ddd34",
                "username": "ChastityBot",
                "isPremium": false,
                "description": "Do not contact me I will not respond",
                "location": "",
                "gender": "",
                "sexualOrientation": "Unspecified",
                "age": null,
                "role": "unspecified",
                "isFindom": false,
                "avatarUrl": "https://cdn01.chaster.app/app/uploads/avatars/6kxN9St3fevXlrn2.png",
                "online": false,
                "lastSeen": null,
                "isAdmin": false,
                "isModerator": false,
                "metadata": {
                "locktober2020Points": 0,
                    "locktober2021Points": 0,
                    "chastityMonth2022Points": 0,
                    "locktober2022Points": 0,
                    "locktober2023Points": 4180
                },
                "fullLocation": "",
                "discordId": null,
                "discordUsername": null,
                "isDisabled": false,
                "isSuspended": false,
                "features": [],
                "joinedAt": "2023-07",
                "isNewMember": false,
                "isSuspendedOrDisabled": false
            },
            "durationMode": "date",
            "isFindom": false,
            "createdAt": "2024-07-08T14:49:17.035Z",
            "updatedAt": "2024-07-08T18:00:05.511Z",
            "tags": [
            "Roulette",
            "Gamble",
            "Game",
            "Luck",
            "Punishment"
        ],
            "reasonForPublicHide": "other",
            "calculatedMaxLimitDuration": 7797
        },
        "createdAt": "2024-07-08T17:59:40.609Z",
        "updatedAt": "2024-07-08T18:04:59.064Z",
        "unlockedAt": null,
        "archivedAt": null,
        "frozenAt": null,
        "keyholderArchivedAt": null,
        "totalDuration": 322255,
        "allowSessionOffer": false,
        "isTestLock": false,
        "offerToken": "a69db607-f2f1-44e8-a3a6-4ca2cb3cd4e3",
        "hideTimeLogs": true,
        "trusted": true,
        "user": {
        "_id": "64b85b0059b61b53887a963e",
            "username": "yrmltyrxnwtzsjlfvz",
            "isPremium": false,
            "description": "https://chaster.app/sessions/lA1JRxxg1CRxRKSy",
            "location": "",
            "gender": "",
            "sexualOrientation": "Unspecified",
            "age": null,
            "role": "unspecified",
            "isFindom": false,
            "avatarUrl": "https://api.chaster.app/users/avatar/default_avatar.jpg",
            "online": false,
            "lastSeen": null,
            "isAdmin": false,
            "isModerator": false,
            "metadata": {
            "locktober2020Points": 0,
                "locktober2021Points": 0,
                "chastityMonth2022Points": 0,
                "locktober2022Points": 0,
                "locktober2023Points": 8970
            },
            "fullLocation": "",
            "discordId": null,
            "discordUsername": null,
            "isDisabled": false,
            "isSuspended": false,
            "features": [],
            "joinedAt": "2023-07",
            "isNewMember": false,
            "isSuspendedOrDisabled": false
        },
        "keyholder": {
        "_id": "64b9392c8fc3d9c36e9ddd34",
            "username": "ChastityBot",
            "isPremium": false,
            "description": "Do not contact me I will not respond",
            "location": "",
            "gender": "",
            "sexualOrientation": "Unspecified",
            "age": null,
            "role": "unspecified",
            "isFindom": false,
            "avatarUrl": "https://cdn01.chaster.app/app/uploads/avatars/6kxN9St3fevXlrn2.png",
            "online": false,
            "lastSeen": null,
            "isAdmin": false,
            "isModerator": false,
            "metadata": {
            "locktober2020Points": 0,
                "locktober2021Points": 0,
                "chastityMonth2022Points": 0,
                "locktober2022Points": 0,
                "locktober2023Points": 4180
            },
            "fullLocation": "",
            "discordId": null,
            "discordUsername": null,
            "isDisabled": false,
            "isSuspended": false,
            "features": [],
            "joinedAt": "2023-07",
            "isNewMember": false,
            "isSuspendedOrDisabled": false
        },
        "isAllowedToViewTime": false,
        "canBeUnlocked": false,
        "canBeUnlockedByMaxLimitDate": false,
        "isFrozen": false,
        "extensions": [
            {
                "slug": "dice",
                "displayName": "Dice",
                "summary": "With every action, you and the bot roll a dice. If you do more than the bot, time is removed. If the bot does more, time is added.",
                "subtitle": "Roll the dice and try to reduce your time locked",
                "icon": "dice",
                "_id": "668c290ce63ab5da944155b8",
                "config": {
                "multiplier": 180
                },
                "mode": "cumulative",
                "regularity": 600,
                "userData": null,
                "nbActionsRemaining": 1,
                "isPartner": false,
                "textConfig": "Time multiplier: 3 minutes",
                "createdAt": "2024-07-08T17:59:40.735Z",
                "updatedAt": "2024-07-08T17:59:40.785Z"
            },
            {
                "slug": "unlock-condition",
                "displayName": "Unlock Gamble",
                "summary": "Let chance decide whether the wearer will be unlocked. Or do they need to perform a task first?Options over options...",
                "subtitle": "Will you be unlocked? Let randomness decide!",
                "icon": "puzzle-piece",
                "_id": "668c290ce63ab5da944155b2",
                "config": {
                "occasion": "GuessTheTimer",
                    "unlockWeight": 1,
                    "taskWeight": 3,
                    "deniedWeight": 1,
                    "tasks": [
                        {
                            "invalidatedByTime": false,
                            "invalidatedByFrozen": false,
                            "invalidatedByPillory": false,
                            "timeChanged": false,
                            "type": "WOF",
                            "text": "Turn the Wheel of Fortune",
                            "needsDesc": false,
                            "weight": 1
                        },
                        {
                            "invalidatedByTime": false,
                            "invalidatedByFrozen": false,
                            "invalidatedByPillory": false,
                            "timeChanged": false,
                            "type": "Dice",
                            "text": "Roll the dice",
                            "needsDesc": false,
                            "weight": 1
                        }
                    ],
                    "deniedPunishments": [
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddFixed",
                                    "desc": "Add time",
                                    "appliedDesc": "Time has been added!",
                                    "min": 60,
                                    "max": 300
                                }
                            ]
                        },
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddTotal",
                                    "desc": "Add the duration locked so far",
                                    "appliedDesc": "Time has been added!"
                                }
                            ]
                        },
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddRemaining",
                                    "desc": "Double the remaining time",
                                    "appliedDesc": "Time has been added!"
                                }
                            ]
                        },
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddFixed",
                                    "desc": "Add time",
                                    "appliedDesc": "Time has been added!",
                                    "min": 60,
                                    "max": 120
                                },
                                {
                                    "type": "Pillory",
                                    "desc": "Pillory",
                                    "appliedDesc": "You have been pilloried!",
                                    "min": 300,
                                    "max": 900
                                }
                            ]
                        }
                    ],
                    "taskFailedPunishments": [
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddFixed",
                                    "desc": "Add time",
                                    "appliedDesc": "Time has been added!",
                                    "min": 60,
                                    "max": 300
                                }
                            ]
                        },
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddTotal",
                                    "desc": "Add the duration locked so far",
                                    "appliedDesc": "Time has been added!"
                                }
                            ]
                        },
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddRemaining",
                                    "desc": "Double the remaining time",
                                    "appliedDesc": "Time has been added!"
                                }
                            ]
                        },
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddFixed",
                                    "desc": "Add time",
                                    "appliedDesc": "Time has been added!",
                                    "min": 60,
                                    "max": 120
                                },
                                {
                                    "type": "Pillory",
                                    "desc": "Pillory",
                                    "appliedDesc": "You have been pilloried!",
                                    "min": 300,
                                    "max": 900
                                }
                            ]
                        }
                    ],
                    "allowFrozenRelease": false,
                    "enforceMinimumWait": false,
                    "grantOnceElapsed": false,
                    "taskDoublePunishments": true
                },
                "mode": "unlimited",
                "regularity": 3600,
                "userData": null,
                "nbActionsRemaining": -1,
                "nextActionDate": "2024-07-08T18:59:40.609Z",
                "isPartner": true,
                "textConfig": "When can ask:\nAnytime (guess the timer)\n\n&nbsp;\n\nOptions:\n- Allow asking when frozen: no\n- Wait for remaining time before requesting again: no\n- Grant unlock once timer elapsed: no\n\n***\n\nPotential outcomes:\n- Unlock (likelihood 1)\n- Denial (likelihood 1)\n- Perform a task (likelihood 3)\n\n\n***\n\nDenial punishments:\n\n- Punishment 1 (likelihood 1)\n  - Add time:\n1 minute\n – \n5 minutes\n- Punishment 2 (likelihood 1)\n  - Add the duration locked so far\n- Punishment 3 (likelihood 1)\n  - Double the remaining time\n- Punishment 4 (likelihood 1)\n  - Add time:\n1 minute\n – \n2 minutes\n  - Pillory:\n5 minutes\n – \n15 minutes\n\n\n***\n\nTasks:\n- Turn the Wheel of Fortune (likelihood 1)\n- Roll the dice (likelihood 1)\n\n&nbsp;\n\nFailed task punishments (double punishment enforced):\n- Punishment 1 (likelihood 1)\n  - Add time:\n1 minute\n – \n5 minutes\n- Punishment 2 (likelihood 1)\n  - Add the duration locked so far\n- Punishment 3 (likelihood 1)\n  - Double the remaining time\n- Punishment 4 (likelihood 1)\n  - Add time:\n1 minute\n – \n2 minutes\n  - Pillory:\n5 minutes\n – \n15 minutes\n",
                "createdAt": "2024-07-08T17:59:40.735Z",
                "updatedAt": "2024-07-08T17:59:42.189Z"
            },
            {
                "slug": "temporary-opening",
                "displayName": "Hygiene opening",
                "summary": "Because hygiene is important, unlock yourself regularly to clean your chastity device. Be careful, if you exceed the allowed time, you will receive a penalty.",
                "subtitle": "Temporarily unlock yourself",
                "icon": "soap",
                "_id": "668c290ce63ab5da944155b4",
                "config": {
                "openingTime": 900,
                    "penaltyTime": 43200,
                    "allowOnlyKeyholderToOpen": false
                },
                "mode": "non_cumulative",
                "regularity": 172800,
                "userData": {
                "openedAt": null
                },
                "nbActionsRemaining": 0,
                "nextActionDate": "2024-07-10T17:59:40.609Z",
                "isPartner": false,
                "textConfig": "Time allowed: 15 minutes, penalty for exceeding time: 12 hours",
                "createdAt": "2024-07-08T17:59:40.735Z",
                "updatedAt": "2024-07-08T17:59:40.791Z"
            },
            {
                "slug": "wheel-of-fortune",
                "displayName": "Wheel of Fortune",
                "summary": "Turn the wheel of fortune and change the duration of your lock. Configure actions for each cell of the wheel of fortune: time added or removed, frozen timer or custom text for your dares.",
                "subtitle": "Try your luck by spinning the Wheel of Fortune",
                "icon": "/static/assets/images/icons/extensions/wheel-of-fortune.svg",
                "_id": "668c290ce63ab5da944155ba",
                "config": {
                "segments": [
                        {
                            "type": "add-time",
                            "duration": 60,
                            "text": ""
                        },
                        {
                            "type": "add-remove-time",
                            "duration": 300,
                            "text": ""
                        },
                        {
                            "type": "pillory",
                            "text": "",
                            "duration": 900
                        },
                        {
                            "type": "remove-time",
                            "text": "",
                            "duration": 300
                        },
                        {
                            "type": "add-remove-time",
                            "duration": 600,
                            "text": ""
                        }
                    ]
                },
                "mode": "cumulative",
                "regularity": 600,
                "userData": null,
                "nbActionsRemaining": 1,
                "isPartner": false,
                "textConfig": "Add 1 minute, Add or remove 5 minutes, Pillory for 15 minutes, Remove 5 minutes, Add or remove 10 minutes",
                "createdAt": "2024-07-08T17:59:40.735Z",
                "updatedAt": "2024-07-08T17:59:40.790Z"
            },
            {
                "slug": "pillory",
                "displayName": "Pillory",
                "summary": "When you receive a penalty, be displayed publicly for a specified period of time. Other users will be able to add time to your lock.",
                "subtitle": "Be displayed publicly when you receive a penalty",
                "icon": "user-friends",
                "_id": "668c290ce63ab5da944155b6",
                "config": {
                "timeToAdd": 3600,
                    "limitToLoggedUsers": true
                },
                "mode": "unlimited",
                "regularity": 3600,
                "userData": null,
                "nbActionsRemaining": -1,
                "isPartner": false,
                "textConfig": "1 hour added per vote",
                "createdAt": "2024-07-08T17:59:40.735Z",
                "updatedAt": "2024-07-08T17:59:40.789Z"
            }
        ],
        "role": "wearer",
        "title": "Gamble With The Hidden Timer",
        "lastVerificationPicture": null,
        "availableHomeActions": [],
        "reasonsPreventingUnlocking": [
            {
                "reason": "Need to beg more",
                "icon": ""
            }
        ],
        "extensionsAllowUnlocking": false
    }
]

[
    {
        "_id": "668c3033020891a3f825ae61",
        "startDate": "2024-07-08T18:30:11.000Z",
        "endDate": null,
        "minDate": "2024-07-08T18:31:11.000Z",
        "maxDate": "2024-07-08T19:30:11.000Z",
        "maxLimitDate": null,
        "displayRemainingTime": false,
        "limitLockTime": true,
        "status": "locked",
        "combination": "668c30339b46ecfae9747179",
        "sharedLock": null,
        "createdAt": "2024-07-08T18:30:11.988Z",
        "updatedAt": "2024-07-08T18:30:12.141Z",
        "unlockedAt": null,
        "archivedAt": null,
        "frozenAt": null,
        "keyholderArchivedAt": null,
        "totalDuration": 47871,
        "allowSessionOffer": true,
        "isTestLock": true,
        "offerToken": "d21b1e77-71c7-471c-b90c-d145203fa790",
        "hideTimeLogs": true,
        "trusted": false,
        "user": {
            "_id": "64b85b0059b61b53887a963e",
            "username": "yrmltyrxnwtzsjlfvz",
            "isPremium": false,
            "description": "https://chaster.app/sessions/lA1JRxxg1CRxRKSy",
            "location": "",
            "gender": "",
            "sexualOrientation": "Unspecified",
            "age": null,
            "role": "unspecified",
            "isFindom": false,
            "avatarUrl": "https://api.chaster.app/users/avatar/default_avatar.jpg",
            "online": false,
            "lastSeen": null,
            "isAdmin": false,
            "isModerator": false,
            "metadata": {
                "locktober2020Points": 0,
                "locktober2021Points": 0,
                "chastityMonth2022Points": 0,
                "locktober2022Points": 0,
                "locktober2023Points": 8970
            },
            "fullLocation": "",
            "discordId": null,
            "discordUsername": null,
            "isDisabled": false,
            "isSuspended": false,
            "features": [],
            "joinedAt": "2023-07",
            "isNewMember": false,
            "isSuspendedOrDisabled": false
        },
        "keyholder": null,
        "isAllowedToViewTime": false,
        "canBeUnlocked": false,
        "canBeUnlockedByMaxLimitDate": false,
        "isFrozen": false,
        "extensions": [
            {
                "slug": "unlock-condition",
                "displayName": "Unlock Gamble",
                "summary": "Let chance decide whether the wearer will be unlocked. Or do they need to perform a task first?Options over options...",
                "subtitle": "Will you be unlocked? Let randomness decide!",
                "icon": "puzzle-piece",
                "_id": "668c3034020891a3f825ae6c",
                "config": {
                    "occasion": "GuessTheTimer",
                    "unlockWeight": 1,
                    "taskWeight": 0,
                    "deniedWeight": 4,
                    "tasks": [],
                    "deniedPunishments": [
                        {
                            "weight": 1,
                            "items": [
                                {
                                    "type": "AddFixed",
                                    "desc": "Add time",
                                    "appliedDesc": "Time has been added!",
                                    "min": 60,
                                    "max": 300
                                }
                            ]
                        }
                    ],
                    "taskFailedPunishments": [],
                    "allowFrozenRelease": true,
                    "enforceMinimumWait": true,
                    "grantOnceElapsed": false,
                    "taskDoublePunishments": false
                },
                "mode": "unlimited",
                "regularity": 3600,
                "userData": null,
                "nbActionsRemaining": -1,
                "nextActionDate": "2024-07-08T19:30:11.988Z",
                "isPartner": true,
                "textConfig": "When can ask:\nAnytime (guess the timer)\n\n&nbsp;\n\nOptions:\n- Allow asking when frozen: yes\n- Wait for remaining time before requesting again: yes\n- Grant unlock once timer elapsed: no\n\n***\n\nPotential outcomes:\n- Unlock (likelihood 1)\n- Denial (likelihood 4)\n\n\n\n***\n\nDenial punishments:\n\n- Punishment 1 (likelihood 1)\n  - Add time:\n1 minute\n – \n5 minutes\n\n\n",
                "createdAt": "2024-07-08T18:30:12.039Z",
                "updatedAt": "2024-07-08T18:30:12.838Z"
            },
            {
                "slug": "pillory",
                "displayName": "Pillory",
                "summary": "When you receive a penalty, be displayed publicly for a specified period of time. Other users will be able to add time to your lock.",
                "subtitle": "Be displayed publicly when you receive a penalty",
                "icon": "user-friends",
                "_id": "668c3034020891a3f825ae6e",
                "config": {
                    "timeToAdd": 60,
                    "limitToLoggedUsers": true
                },
                "mode": "unlimited",
                "regularity": 3600,
                "userData": null,
                "nbActionsRemaining": -1,
                "isPartner": false,
                "textConfig": "1 minute added per vote",
                "createdAt": "2024-07-08T18:30:12.039Z",
                "updatedAt": "2024-07-08T18:30:12.072Z"
            }
        ],
        "role": "wearer",
        "title": "Self-lock",
        "lastVerificationPicture": null,
        "availableHomeActions": [],
        "reasonsPreventingUnlocking": [
            {
                "reason": "Need to beg more",
                "icon": ""
            }
        ],
        "extensionsAllowUnlocking": false
    }
]
*/
