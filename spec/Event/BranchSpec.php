<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\User,
    Ikwattro\GithubEvent\Event\Repository;

class BranchSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\Branch');
    }

    function it_should_have_a_label()
    {
        $this->setLabel('neoxygen:relProp');
        $this->getLabel()->shouldReturn('neoxygen:relProp');
    }

    function it_should_have_a_reference_name()
    {
        $this->setReferenceName('relProp');
        $this->getReferenceName()->shouldReturn('relProp');
    }

    function it_should_have_an_origin_user(User $user)
    {
        $this->setUser($user);
        $this->getUser()->shouldReturn($user);
    }

    function it_should_have_a_repository(Repository $repository)
    {
        $this->setRepository($repository);
        $this->getRepository()->shouldReturn($repository);
    }


}
