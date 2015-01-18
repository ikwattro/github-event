<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrganizationSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(123, 'neoxygen');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\Organization');
    }

    function it_should_have_an_id_on_construct()
    {
        $this->getId()->shouldReturn(123);
    }

    function it_should_have_a_name_on_construct()
    {
        $this->getName()->shouldReturn('neoxygen');
    }
}
