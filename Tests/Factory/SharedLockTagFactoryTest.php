<?php

namespace Fake\ChasterFactory\Tests\Factory;

use Fake\ChasterFactory\Factory\SharedLockTagFactory;
use Fake\ChasterObjects\Objects\SharedLockTags\SharedLockTag;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class SharedLockTagFactoryTest extends TestCase
{
    use Factories;

    public function testFactory()
    {
        $tag = SharedLockTagFactory::createOne();
        self::assertInstanceOf(SharedLockTag::class, $tag);
    }
}
