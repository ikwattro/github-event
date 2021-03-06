<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\Organization;

class RepositorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123, 'ikwattro/github-event-mapper');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\Repository');
    }

    function it_should_have_an_id_on_construct()
    {
        $this->getId()->shouldReturn(123);
    }

    function it_should_have_a_name_on_construct()
    {
        $this->getName()->shouldReturn('ikwattro/github-event-mapper');
    }

    function it_should_have_a_organization_boolean(Organization $organization)
    {
        $this->isOrg()->shouldReturn(false);
        $organization->getName()->willReturn('neoxygen');
        $this->setOrganization($organization);
        $this->isOrg()->shouldReturn(true);
        $this->getOrganization()->getName()->shouldReturn('neoxygen');
    }
}
