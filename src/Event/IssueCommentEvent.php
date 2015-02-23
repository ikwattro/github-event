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


class IssueCommentEvent extends IssuesEvent
{
    /**
     *
     */
    const EVENT_TYPE = 'IssueCommentEvent';

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var int Comment ID
     */
    protected $commentId;

    /**
     * @var User
     */
    protected $commentAuthor;

    /**
     * @return string
     */
    public function getEventType()
    {
        return self::EVENT_TYPE;
    }

    /**
     * @param $comment
     */
    public function setComment($comment)
    {
        $this->comment = (string) $comment;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return int
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param int $commentId
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * @param User $author
     */
    public function setCommentAuthor(User $author)
    {
        $this->commentAuthor = $author;
    }

    /**
     * @return User
     */
    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }
}
