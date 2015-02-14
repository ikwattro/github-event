<?php

namespace spec\Ikwattro\GithubEvent\EventProcessor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PushEventProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\EventProcessor\PushEventProcessor');
    }

    function it_should_implement_processor_interface()
    {
        $this->shouldImplement('Ikwattro\GithubEvent\EventProcessor\EventProcessorInterface');
    }
}
