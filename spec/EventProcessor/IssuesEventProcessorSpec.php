<?php

namespace spec\Ikwattro\GithubEvent\EventProcessor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IssuesEventProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\EventProcessor\IssuesEventProcessor');
    }

    function it_should_implement_processor_interface()
    {
      $this->shouldImplement('Ikwattro\GithubEvent\EventProcessor\EventProcessorInterface');
    }

    function it_should_get_the_issue_action()
    {
      $ev = array('payload' => array('action' => 'closed'));
      $this->getIssueAction($ev)->shouldReturn('closed');
    }

    function it_should_return_the_issue_state()
    {
      $event = json_decode(file_get_contents(__DIR__.'/../events/issuesEvent.json'), true);
      $this->getIssueState($event)->shouldReturn('open');
    }
}
