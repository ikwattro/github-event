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
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param $id
     * @param $login
     * @param $type
     */
    public function __construct($id, $login, $type)
    {
        $this->id = (int) $id;
        $this->login = (string) $login;
        $this->type = strtolower($type);
    }

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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return bool
     */
    public function isUser()
    {
        if ('user' === $this->type) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isOrg()
    {
        if ('organization' === $this->type) {
            return true;
        }

        return false;
    }
}
