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

class Branch
{
    protected $label;

    protected $referenceName;

    protected $repository;

    protected $user;

    public function setLabel($label)
    {
        $this->label = (string) $label;
    }

    public function setReferenceName($name)
    {
        $this->referenceName = (string) $name;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function setRepository(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getReferenceName()
    {
        return $this->referenceName;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getRepository()
    {
        return $this->repository;
    }
}
