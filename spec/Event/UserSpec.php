<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(123, 'ikwattro', 'User');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\User');
    }

    function it_should_have_an_id_on_construct()
    {
        $this->getId()->shouldReturn(123);
    }

    function it_should_have_a_login_on_construct()
    {
        $this->getLogin()->shouldReturn('ikwattro');
    }

    function it_should_have_a_user_type()
    {
        $this->isUser()->shouldReturn(true);
    }

    function it_should_have_a_org_type()
    {
        $this->isOrg()->shouldReturn(false);
    }

    function it_should_return_true_when_org()
    {
        $this->beConstructedWith(123, 'neoxygen', 'organization');
        $this->isUser()->shouldReturn(false);
        $this->isOrg()->shouldReturn(true);
    }
}
