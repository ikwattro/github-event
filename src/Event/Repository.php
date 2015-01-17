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

use Ikwattro\GithubEvent\Exception\InvalidEventException;

class Repository
{

    protected $id;

    protected $name;

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
}
