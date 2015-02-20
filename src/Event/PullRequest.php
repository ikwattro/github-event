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

class PullRequest
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $number;

    /**
     * @var null|string
     */
    protected $state;

    /**
     * @var null|string
     */
    protected $body;

    /**
     * @var null|boolean
     */
    protected $merged;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var User
     */
    protected $merger;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var null|\DateTime
     */
    protected $closedAt;

    /**
     * @var null|\DateTime
     */
    protected $mergedAt;

    protected $base;

    protected $head;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getState()
    {
        if (null === $this->state) {
            return;
        }

        return strtoupper($this->state);
    }

    /**
     * @return null|string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return bool
     */
    public function isMerged()
    {
        return null !== $this->merged;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return null|User
     */
    public function getMerger()
    {
        return $this->merger;
    }

    /**
     * @param $v
     */
    public function setCreatedAt($v)
    {
        $this->createdAt = new \DateTime($v);
    }

    /**
     * @param $v
     */
    public function setUpdatedAt($v)
    {
        $this->updatedAt = new \DateTime($v);
    }

    /**
     * @param $v
     */
    public function setClosedAt($v)
    {
        $this->closedAt = new \DateTime($v);
    }

    /**
     * @param $v
     */
    public function setMergedAt($v)
    {
        $this->mergedAt = new \DateTime($v);
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * @param $v
     */
    public function setTitle($v)
    {
        $this->title = (string) $v;
    }

    /**
     * @param $v
     */
    public function setNumber($v)
    {
        $this->number = (int) $v;
    }

    /**
     *
     */
    public function setClosed()
    {
        $this->state = 'CLOSED';
    }

    /**
     * @param $v
     */
    public function setBody($v)
    {
        $this->body = (string) $v;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $merger
     */
    public function setMerger(User $merger)
    {
        $this->merger = $merger;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return mixed
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * @return mixed
     */
    public function getMergedAt()
    {
        return $this->mergedAt;
    }

    /**
     *
     */
    public function setMerged()
    {
        $this->merged = true;
    }

    public function setOpen()
    {
        $this->state = 'OPEN';
    }

    public function setState($state)
    {
        if (null !== $state) {
            if ('open' === $state) {
                $this->setOpen();
            } elseif ('closed' === $state) {
                $this->setClosed();
            }
        }
    }

    public function setHead(Branch $branch)
    {
        $this->head = $branch;
    }

    public function getHead()
    {
        return $this->head;
    }

    public function setBase(Branch $branch)
    {
        $this->base = $branch;
    }

    public function getBase()
    {
        return $this->base;
    }
}
