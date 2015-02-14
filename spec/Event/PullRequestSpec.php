<?php

namespace spec\Ikwattro\GithubEvent\Event;

use Ikwattro\GithubEvent\Event\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PullRequestSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\PullRequest');
    }

    function it_should_have_an_id()
    {
        $this->getId()->shouldReturn(null);
        $this->setId(123);
        $this->getId()->shouldReturn(123);
        $this->setId('123');
        $this->getId()->shouldReturn(123);
    }

    function it_should_have_a_title()
    {
        $this->getTitle()->shouldReturn(null);
        $this->setTitle('PR Title');
        $this->getTitle()->shouldReturn('PR Title');
    }

    function it_should_have_a_pr_number()
    {
        $this->getNumber()->shouldReturn(null);
        $this->setNumber(123);
        $this->getNumber()->shouldReturn(123);
    }

    function it_should_have_a_state()
    {
        $this->getState()->shouldReturn(null);
        $this->setClosed();
        $this->getState()->shouldReturn('CLOSED');
        $this->setOpen();
        $this->getState()->shouldReturn('OPEN');
    }

    function it_should_hold_a_body()
    {
        $this->getBody()->shouldReturn(null);
        $this->setBody(null);
        $this->getBody()->shouldReturn('');
        $this->setBody('PR Body');
        $this->getBody()->shouldReturn('PR Body');
    }

    function it_should_return_if_pr_is_merged()
    {
        $this->isMerged()->shouldReturn(false);
        $this->setMerged();
        $this->isMerged()->shouldReturn(true);
    }

    function it_should_have_a_pr_user(User $user)
    {
        $this->setUser($user);
        $this->getUser()->shouldReturn($user);
    }

    function it_should_hold_a_merger_actor(User $user)
    {
        $this->getMerger()->shouldReturn(null);
        $this->setMerger($user);
        $this->getMerger()->shouldReturn($user);
    }

    function it_should_have_a_creation_date()
    {
        $this->setCreatedAt('2015-01-15T21:51:13Z');
        $this->getCreatedAt()->shouldHaveType('\DateTime');
    }

    function it_should_have_an_update_date()
    {
        $this->setUpdatedAt('2015-01-15T21:51:13Z');
        $this->getUpdatedAt()->shouldHaveType('\DateTime');
    }

    function it_should_have_a_close_date()
    {
        $this->setClosedAt('2015-01-15T21:51:13Z');
        $this->getClosedAt()->shouldHaveType('\DateTime');
    }

    function it_should_have_a_merge_date()
    {
        $this->setMergedAt('2015-01-15T21:51:13Z');
        $this->getMergedAt()->shouldHaveType('\DateTime');
    }
}
