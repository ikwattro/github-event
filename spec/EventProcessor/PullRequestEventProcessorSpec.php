<?php

namespace spec\Ikwattro\GithubEvent\EventProcessor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PullRequestEventProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\EventProcessor\PullRequestEventProcessor');
    }
}
