<?php

/**
 * This file is part of the GithubEvent package.
 *
 * (c) Christophe Willemsen <chris@neoxygen.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT License
 */

namespace Ikwattro\GithubEvent\EventProcessor;

interface EventProcessorInterface
{
    public static function getEventType();
    public function processEvent(array $event);
}
