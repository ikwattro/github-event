<?php

namespace Ikwattro\GithubEvent\Tests\Functional;

use Ikwattro\GithubEvent\EventHandler;

class WatchEventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Ikwattro\GithubEvent\EventHandler
     */
    protected $handler;

    /**
     * @var array
     */
    protected $events;

    public function setUp()
    {
        $this->handler = EventHandler::create()
            ->build();

        $this->events = json_decode(file_get_contents(__DIR__.'/../events.json'), true);
    }

    public function testWatchEventIsHandled()
    {
        $event = $this->events[0];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\WatchEvent', $eventO);
        $this->assertTrue($eventO->isWatched());
        $this->assertEquals('ikwattro', $eventO->getActor()->getLogin());
        $this->assertEquals('apcj/query-plan-viz', $eventO->getRepository()->getName());
    }

    public function testCreateEventIsHandled()
    {
        $event = $this->events[5];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\CreateEvent', $eventO);
        $this->assertTrue($eventO->isNewTag());
        $this->assertEquals('neoxygen/neo4j-neoclient', $eventO->getRepository()->getName());
        $this->assertEquals('2.0.10', $eventO->getNewTagName());
        $this->assertEquals('ikwattro', $eventO->getActor()->getLogin());
    }

    public function testIssuesEventIsHandled()
    {
        $event = $this->events[3];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\IssuesEvent', $eventO);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\Issue', $eventO->getIssue());
        $this->assertEquals('JackieXu', $eventO->getIssue()->getAuthor()->getLogin());
        $this->assertEquals('CLOSED', $eventO->getAction());
    }

    public function testIssueCommentEventIsHandled()
    {
        $event = $this->events[4];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\IssueCommentEvent', $eventO);
        $this->assertEquals('ikwattro', $eventO->getCommentAuthor()->getLogin());
        $this->assertFalse($eventO->getCommentAuthor()->isOrg());
        $this->assertEquals('JackieXu', $eventO->getIssue()->getAuthor()->getLogin());
    }

    public function testPushEventIsHandled()
    {
        $event = $this->events[6];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\PushEvent', $eventO);
        $this->assertEquals('refs/heads/master', $eventO->getReference());
        $this->assertCount(2, $eventO->getCommits());
    }

    public function testPullRequestEventIsHandled()
    {
        $event = $this->events[9];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\PullRequestEvent', $eventO);
        $this->assertEquals('OPENED', $eventO->getAction());
        $this->assertEquals(27465438, $eventO->getPullRequest()->getId());
        $this->assertEquals('neo4j-neoclient', $eventO->getPullRequest()->getBase()->getRepository()->getName());
        $this->assertTrue($eventO->isOpenAction());
        $this->assertFalse($eventO->getPullRequest()->isMerged());
    }

    public function testPullRequestEventIsHandledBis()
    {
        $event = $this->events[37];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\PullRequestEvent', $eventO);
        $this->assertEquals('OPENED', $eventO->getAction());
        $this->assertTrue($eventO->isOpenAction());
        $this->assertFalse($eventO->getPullRequest()->isMerged());
        $this->assertTrue($eventO->getPullRequest()->getBase()->getRepository()->getOwner()->isOrg());
    }

    public function testPullRequestEventIsMerged()
    {
        $event = $this->events[120];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\PullRequestEvent', $eventO);
        $this->assertTrue($eventO->isCloseAction());
        $this->assertTrue($eventO->getPullRequest()->isMerged());
        $this->assertEquals('Fixed "next significant release" tilde operator use', $eventO->getPullRequest()->getTitle());
    }

    public function testPullRequestHeadRepoOwnerIsMappedWhenRepoIsDeleted()
    {
        $event = $this->events[105];
        $eventO = $this->handler->handleEvent($event);
        $this->assertInstanceOf('Ikwattro\GithubEvent\Event\PullRequestEvent', $eventO);
        $this->assertEquals(1108235, $eventO->getPullRequest()->getHead()->getRepository()->getOwner()->getId());
        $this->assertEquals(crc32($eventO->getPullRequest()->getHead()->getUser()->getLogin() . $eventO->getPullRequest()->getHead()->getLabel()), $eventO->getPullRequest()->getHead()->getRepository()->getId());
    }
}