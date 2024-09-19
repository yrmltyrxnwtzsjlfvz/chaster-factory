<?php

namespace Fake\ChasterFactory\Factory\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\SessionOfferAcceptedActionLog;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<SessionOfferAcceptedActionLog>
 *
 * @method        SessionOfferAcceptedActionLog   create(array|callable $attributes = [])
 * @method static SessionOfferAcceptedActionLog   createOne(array $attributes = [])
 * @method static SessionOfferAcceptedActionLog[] createMany(int $number, array|callable $attributes = [])
 * @method static SessionOfferAcceptedActionLog[] createSequence(iterable|callable $sequence)
 */
class SessionOfferAcceptedActionLogFactory extends ActionLogFactory
{
    public static function class(): string
    {
        return SessionOfferAcceptedActionLog::class;
    }
}
