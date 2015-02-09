<?php

namespace spec\Larasponge;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SanitizesInputTraitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Larasponge\SanitizesInputTrait');
    }
}
