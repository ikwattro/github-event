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

class CreateEvent extends BaseEvent
{
    /**
     *
     */
    const NEW_REPO = 'CREATE_REPOSITORY';

    /**
     *
     */
    const NEW_TAG = 'CREATE_TAG';

    /**
     *
     */
    const NEW_BRANCH = 'CREATE_BRANCH';

    /**
     * @var
     */
    protected $type;

    /**
     * @var
     */
    protected $reference;

    /**
     * @var
     */
    protected $masterBranch;

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = (string) $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        $str = strtoupper('CREATE_' . $this->type);

        return $str;
    }

    /**
     * @return bool
     */
    public function isNewRepository()
    {
        return self::NEW_REPO === $this->getType();
    }

    /**
     * @return bool
     */
    public function isNewTag()
    {
        return self::NEW_TAG === $this->getType();
    }

    /**
     * @return bool
     */
    public function isNewBranch()
    {
        return self::NEW_BRANCH === $this->getType();
    }

    /**
     * @param $ref
     */
    public function setReference($ref)
    {
        $this->reference = (string) $ref;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return mixed
     */
    public function getNewBranchName()
    {
        if (!$this->isNewBranch()) {
            throw new \InvalidArgumentException(sprintf('The CreateEvent is of type "%s"', $this->getType()));
        }

        return $this->getReference();
    }

    /**
     * @return mixed
     */
    public function getNewTagName()
    {
        if (!$this->isNewTag()) {
            throw new \InvalidArgumentException(sprintf('The CreateEvent is of type "%s"', $this->getType()));
        }

        return $this->getReference();
    }

    /**
     * @return string
     */
    public function getMasterBranch()
    {
        return $this->masterBranch;
    }

    /**
     * @param string|int $name
     */
    public function setMasterBranch($name)
    {
        $this->masterBranch = (string) $name;
    }
}
