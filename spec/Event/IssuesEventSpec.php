<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\Issue;

class IssuesEventSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\BaseEvent');
    }

    function it_should_get_the_issue_action()
    {
        $this->setAction('closed');
        $this->getAction()->shouldReturn('CLOSED');
    }

    function it_should_hold_an_issue_object(Issue $issue)
    {
        $this->setIssue($issue);
        $this->getIssue()->shouldReturn($issue);
    }
}
