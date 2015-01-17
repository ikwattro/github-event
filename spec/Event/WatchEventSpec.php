<?php

namespace spec\Ikwattro\GithubEvent\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WatchEventSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\Event\BaseEvent');
    }

    function it_should_have_boolean_for_watched_unwatched_event()
    {
        $this->setWatched(true);
        $this->isWatched()->shouldReturn(true);
        $this->setWatched(false);
        $this->isWatched()->shouldReturn(false);
        $this->setWatched();
        $this->isWatched()->shouldReturn(true);
    }
}
