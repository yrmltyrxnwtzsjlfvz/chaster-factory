<?php

namespace Fake\ChasterFactory\Factory\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\LinkTimeChangedPayload;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<LinkTimeChangedPayload>
 *
 * @method        LinkTimeChangedPayload   create(array|callable $attributes = [])
 * @method static LinkTimeChangedPayload   createOne(array $attributes = [])
 * @method static LinkTimeChangedPayload[] createMany(int $number, array|callable $attributes = [])
 * @method static LinkTimeChangedPayload[] createSequence(iterable|callable $sequence)
 */
final class LinkTimeChangedPayloadFactory extends DurationPayloadFactory
{
    public static function class(): string
    {
        return LinkTimeChangedPayload::class;
    }
}
