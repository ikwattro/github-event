<?php

namespace spec\Ikwattro\GithubEvent\Event;

use Ikwattro\GithubEvent\Event\Repository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ikwattro\GithubEvent\Event\Actor;

class BaseEventSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\BaseEvent');
    }

    function it_should_have_an_event_id_on_construct()
    {
        $this->getEventId()->shouldReturn(123);
    }

    function it_should_set_the_event_actor(Actor $actor)
    {
        $this->setActor($actor);
        $this->getActor()->shouldReturn($actor);
    }

    function it_should_set_the_repository(Repository $repository)
    {
        $this->setRepository($repository);
        $this->getRepository()->shouldReturn($repository);
    }

    function it_should_have_an_event_time_object()
    {
        $this->setTime('2015-01-17T01:24:24Z');
        $this->getCreatedTime()->shouldHaveType('\DateTime');
    }

    function it_should_return_splitted_time()
    {
        $this->setTime('2015-01-17T01:24:24Z');
        $this->getYear()->shouldReturn(2015);
        $this->getDay()->shouldReturn(17);
        $this->getMonth()->shouldReturn(01);
        $this->getHour()->shouldReturn(01);
        $this->getMinute()->shouldReturn(24);
    }
}
