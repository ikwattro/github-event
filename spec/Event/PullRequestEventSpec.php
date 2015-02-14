<?php

namespace spec\Ikwattro\GithubEvent\Event;

use Ikwattro\GithubEvent\Event\Repository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\User;

class PullRequestEventSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\PullRequestEvent');
    }

    function it_should_extend_base_event()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\BaseEvent');
    }

    function it_should_have_a_pr_action()
    {
        $this->getAction()->shouldReturn(null);
        $this->setCloseAction();
        $this->isCloseAction()->shouldReturn(true);
        $this->getAction()->shouldReturn('CLOSED');
    }


}
