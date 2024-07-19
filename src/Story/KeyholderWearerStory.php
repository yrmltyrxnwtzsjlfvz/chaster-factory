<?php

namespace Fake\ChasterFactory\Story;

use Fake\ChasterObjects\Enums\ProfileRole;
use Fake\ChasterObjects\Tests\Factory\UserFactory;
use Zenstruck\Foundry\Story;

final class KeyholderWearerStory extends Story
{
    public function build(): void
    {
        $this->addToPool('keyholder', UserFactory::createOne(['role' => ProfileRole::KEYHOLDER]));
        $this->addToPool('wearer', UserFactory::createOne(['role' => ProfileRole::WEARER]));
    }
}
