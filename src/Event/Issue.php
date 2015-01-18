<?php

/**
* This file is part of the GithubEvent package
*
* (c) Christophe Willemsen <chris@neoxygen.io>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
*/

namespace Ikwattro\GithubEvent\Event;

class Issue
{
    const STATE_CLOSED = 'CLOSED';

    const STATE_OPEN = 'OPEN';

    protected $id;

    protected $number;

    protected $title;

    protected $state;

    protected $body;

    protected $creationTime;

    protected $author;

    public function __construct($id, $number)
    {
        $this->id = (int) $id;
        $this->number = (int) $number;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setTitle($title)
    {
        $this->title = (string) $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setState($state)
    {
        $s = (string) $state;
        if (strtoupper($s) !== self::STATE_CLOSED && strtoupper($s) !== self::STATE_OPEN) {
            throw new \InvalidArgumentException(sprintf(
                'The issue state should be of type "%s" or "%s"',
                self::STATE_CLOSED,
                self::STATE_OPEN
            ));
        }

        $this->state = $s;
    }

    public function setBody($body)
    {
        $this->body = (string) $body;
    }

    public function getState()
    {
        return strtoupper($this->state);
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setCreationTime($time)
    {
        $this->creationTime = new \DateTime($time);
    }

    public function setAuthor(User $author)
    {
        $this->author = $author;
    }

    public function getCreationTime()
    {
        return $this->creationTime;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}
