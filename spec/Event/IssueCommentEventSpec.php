<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\User;

class IssueCommentEventSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123, 25);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\BaseEvent');
    }

    function it_should_have_a_comment()
    {
        $this->setComment('Thanks!');
        $this->getComment()->shouldReturn('Thanks!');
    }

    function it_should_have_a_comment_author(User $author)
    {
        $this->setCommentAuthor($author);
        $this->getCommentAuthor()->shouldReturn($author);
    }
}
