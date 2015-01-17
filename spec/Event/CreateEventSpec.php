<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\BaseEvent');
    }

    function it_should_have_a_creation_type()
    {
        $this->setType('repository');
        $this->getType()->shouldReturn('CREATE_REPOSITORY');
    }

    function it_should_say_if_it_is_a_new_type()
    {
        $this->setType('repository');
        $this->isNewRepository()->shouldReturn(true);
        $this->isNewTag()->shouldReturn(false);
        $this->isNewBranch()->shouldReturn(false);
    }

    function it_should_set_the_reference()
    {
        $this->setReference('fix');
        $this->getReference()->shouldReturn('fix');
    }

    function it_should_return_the_new_branch_name_only_if_branch_is_create_type()
    {
        $this->setType('repository');
        $this->shouldThrow('\InvalidArgumentException')->duringGetNewBranchName();
        $this->setType('branch');
        $this->setReference('fix');
        $this->getNewBranchName()->shouldReturn('fix');
    }

    function it_should_return_the_new_tag_name_only_if_tag_is_create_Type()
    {
        $this->setType('repository');
        $this->shouldThrow('\InvalidArgumentException')->duringGetNewTagName();
        $this->setType('tag');
        $this->setReference('0.5');
        $this->getNewTagName()->shouldReturn('0.5');
    }

    function it_should_get_or_set_the_master_branch()
    {
        $this->getMasterBranch()->shouldReturn(null);
        $this->setMasterBranch('master');
        $this->getMasterBranch()->shouldReturn('master');
        $this->setMasterBranch(1);
        $this->getMasterBranch()->shouldReturn('1');
    }
}
