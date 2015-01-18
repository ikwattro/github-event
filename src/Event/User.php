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

class User
{
    protected $id;

    protected $login;

    protected $type;

    public function __construct($id, $login, $type)
    {
        $this->id = (int) $id;
        $this->login = (string) $login;
        $this->type = strtolower($type);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function isUser()
    {
        if ('user' === $this->type) {
            return true;
        }

        return false;
    }

    public function isOrg()
    {
        if ('organization' === $this->type) {
            return true;
        }

        return false;
    }
}
