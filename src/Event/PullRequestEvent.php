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

class PullRequestEvent extends BaseEvent
{
    const EVENT_TYPE = 'PullRequestEvent';

    /**
     * @var string
     */
    protected $action;

    protected $pullRequest;

    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     *
     */
    public function setCloseAction()
    {
        $this->action = 'CLOSED';
    }

    public function setOpenAction()
    {
        $this->action = 'OPENED';
    }

    /**
     * @return bool
     */
    public function isCloseAction()
    {
        return 'CLOSED' === $this->action;
    }

    public function isOpenAction()
    {
        return 'OPENED' === $this->action;
    }

    public function setAction($action)
    {
        if (null !== $action) {
            $v = strtolower($action);
            if ('opened' === $v) {
                $this->setOpenAction();
            } elseif ('closed' === $action) {
                $this->setCloseAction();
            }
        }
    }

    public function setPullRequest(PullRequest $pr)
    {
        $this->pullRequest = $pr;
    }

    public function getPullRequest()
    {
        return $this->pullRequest;
    }
}
