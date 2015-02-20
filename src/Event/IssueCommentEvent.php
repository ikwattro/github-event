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

use Ikwattro\GithubEvent\Event\User;

class IssueCommentEvent extends IssuesEvent
{
    const EVENT_TYPE = 'IssueCommentEvent';

    protected $comment;

    protected $commentAuthor;

    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    public function setComment($comment)
    {
        $this->comment = (string) $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setCommentAuthor(User $author)
    {
        $this->commentAuthor = $author;
    }

    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }
}
