<?php

namespace spec\Ikwattro\GithubEvent\EventProcessor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WatchEventProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\EventProcessor\WatchEventProcessor');
    }

    function it_should_implement_processor_interface()
    {
        $this->shouldImplement('Ikwattro\GithubEvent\EventProcessor\EventProcessorInterface');
    }

    function it_should_determine_if_it_is_watch_or_unwatch()
    {
        $payload = array(
            'payload' => array(
                'action' => 'started'
            )
        );
        $this->isWatched($payload)->shouldReturn(true);
    }


}
