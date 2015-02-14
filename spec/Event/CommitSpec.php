<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\Commit');
    }

    function it_should_have_an_sha()
    {
        $this->getSha()->shouldReturn(null);
        $this->setSha('87aa2201e82a031e650e085f098e7f71e37f2045');
        $this->getSha()->shouldReturn('87aa2201e82a031e650e085f098e7f71e37f2045');
    }

    function it_should_have_a_commit_author_email()
    {
        $this->getAuthorEmail()->shouldReturn(null);
        $this->setAuthorEmail('chris@neoxygen.io');
        $this->getAuthorEmail()->shouldReturn('chris@neoxygen.io');
    }

    function it_should_have_a_commit_author_name()
    {
        $this->getAuthorName()->shouldReturn(null);
        $this->setAuthorName('Christophe Willemsen');
        $this->getAuthorName()->shouldReturn('Christophe Willemsen');
    }

    function it_should_have_a_commit_message()
    {
        $this->getMessage()->shouldReturn(null);
        $this->setMessage('Commit message');
        $this->getMessage()->shouldReturn('Commit message');
    }

    function it_should_have_a_commit_url()
    {
        $this->getUrl()->shouldReturn(null);
        $this->setUrl('http://commit.com');
        $this->getUrl()->shouldReturn('http://commit.com');
    }
}
