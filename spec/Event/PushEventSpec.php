<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\Commit;

class PushEventSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\PushEvent');
    }

    function it_should_extend_base_event()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\BaseEvent');
    }

    function it_should_have_an_empty_array_of_commits_on_construct()
    {
        $this->getCommits()->shouldHaveCount(0);
    }

    function it_should_hold_commit_collection(Commit $commit)
    {
        $this->addCommit($commit);
        $this->getCommits()->shouldHaveCount(1);
    }

    function it_should_have_the_branch_ref()
    {
        $this->getReference()->shouldReturn(null);
        $this->setReference('refs/head/master');
        $this->getReference()->shouldReturn('refs/head/master');
    }
}
