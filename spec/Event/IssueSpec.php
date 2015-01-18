<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\User;

class IssueSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(123, 25);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\Issue');
    }

    function it_should_have_an_id_on_construct()
    {
        $this->getId()->shouldReturn(123);
    }

    function it_should_have_an_issue_number_on_construct()
    {
        $this->getNumber()->shouldReturn(25);
    }

    function it_should_have_a_title_setter()
    {
        $this->setTitle('Bad exception');
        $this->getTitle()->shouldReturn('Bad exception');
    }

    function it_should_have_a_state()
    {
        $this->setState('closed');
        $this->getState()->shouldReturn('CLOSED');
        $this->setState('open');
        $this->getState()->shouldReturn('OPEN');
    }

    function it_should_have_a_body()
    {
        $this->setBody('kj ksjd qfkljdk ljklds jq');
        $this->getBody()->shouldReturn('kj ksjd qfkljdk ljklds jq');
    }

    function it_should_have_a_issue_open_time()
    {
        $this->setCreationTime('2015-01-15T14:45:37Z');
        $this->getCreationTime()->shouldHaveType('\DateTime');
    }

    function it_should_have_an_issue_author(User $user)
    {
        $user->getLogin()->willReturn('ikwattro');
        $this->setAuthor($user);
        $this->getAuthor()->getLogin()->shouldReturn('ikwattro');
    }
}
