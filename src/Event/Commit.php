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

class Commit
{
    protected $sha;

    protected $authorEmail;

    protected $authorName;

    protected $message;

    protected $url;

    public function getSha()
    {
        return $this->sha;
    }

    public function setSha($sha)
    {
        $this->sha = (string) $sha;
    }

    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    public function setAuthorEmail($email)
    {
        $this->authorEmail = (string) $email;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function setAuthorName($name)
    {
        $this->authorName = (string) $name;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = (string) $message;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = (string) $url;
    }
}
