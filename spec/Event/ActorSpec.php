<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123, 'ikwattro');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\Actor');
    }

    function it_should_have_an_id_on_construct()
    {
        $this->getId()->shouldReturn(123);
    }

    function it_should_have_a_login_on_construct()
    {
        $this->getLogin()->shouldReturn('ikwattro');
    }
}
