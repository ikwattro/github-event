<?php

namespace spec\Ikwattro\GithubEvent\EventProcessor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ikwattro\GithubEvent\EventProcessor\CreateEventProcessor');
    }

    function it_should_implements_processor_interface()
    {
        $this->shouldImplement('Ikwattro\GithubEvent\EventProcessor\EventProcessorInterface');
    }

    function it_should_fetch_the_creation_type()
    {
        $ev = array('payload' => array('ref_type' => 'repository'));
        $this->getCreationType($ev)->shouldReturn('repository');
    }

    function it_should_fetch_type_info()
    {
        $ev = array('payload' => array(
            'ref_type' => 'tag',
            'ref' => '0.5',
            'description' => 'Easy GE to Neo4j',
            'master_branch' => 'master'
        )
        );
        $this->getReference($ev)->shouldReturn('0.5');
        $this->getDescription($ev)->shouldReturn('Easy GE to Neo4j');
        $this->getMasterBranch($ev)->shouldReturn('master');

        $ev = array('payload' => array('ref_type' => 'repository'));
        $this->getReference($ev)->shouldReturn(null);
        $this->getDescription($ev)->shouldReturn(null);

    }
}
