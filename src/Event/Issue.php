<?php

/**
 * This file is part of the GithubEvent package.
 *
 * (c) Christophe Willemsen <chris@neoxygen.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ikwattro\GithubEvent\Event;

class Issue
{
    /**
     *
     */
    const STATE_CLOSED = 'CLOSED';

    /**
     *
     */
    const STATE_OPEN = 'OPEN';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $number;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var \DateTime
     */
    protected $creationTime;

    /**
     * @var User
     */
    protected $author;

    /**
     * @param $id
     * @param $number
     */
    public function __construct($id, $number)
    {
        $this->id = (int) $id;
        $this->number = (int) $number;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = (string) $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $state
     */
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

    /**
     * @param $body
     */
    public function setBody($body)
    {
        $this->body = (string) $body;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return strtoupper($this->state);
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param $time
     */
    public function setCreationTime($time)
    {
        $this->creationTime = new \DateTime($time);
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;
    }

    /**
     * @return \DateTime
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
