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

class Repository
{

    protected $id;

    protected $name;

    protected $organization;

    protected $owner;

    public function __construct($id, $name)
    {
        $this->id = (int) $id;
        $this->name = (string) $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isOrg()
    {
        if (null !== $this->organization) {
            return true;
        }

        return false;
    }

    public function setOrganization(Organization $organization)
    {
        $this->organization = $organization;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    public function setOwner(User $user)
    {
        $this->owner = $user;
    }

    public function getOwner()
    {
        return $this->owner;
    }
}
