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

namespace Ikwattro\GithubEvent;

use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\ContainerInterface;
use Ikwattro\GithubEvent\DependencyInjection\GithubEventExtension;

class EventHandler
{
    /**
     * @var string
     */
    public static $version = '1.0.0';

    /**
     * @var ContainerBuilder|ContainerInterface
     */
    protected $serviceContainer;

    /**
     * @var array User defined configuration array
     */
    protected $configuration = [];

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container = null)
    {
        if (null === $container) {
            $container = new ContainerBuilder();
        }

        $this->serviceContainer = $container;

        return $this;
    }

    /**
     * Creates a new instance of the Github Event Handler
     *
     * @return EventHandler
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Returns the Github Event Handler library's version
     *
     * @return string GithubEventHandler version
     */
    public static function getVersion()
    {
        return self::$version;
    }

    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @return \Ikwattro\GithubEvent\EventHandler
     */
    public function build()
    {
        $extension = new GithubEventExtension();
        $this->serviceContainer->registerExtension($extension);
        $this->serviceContainer->loadFromExtension($extension->getAlias(), $this->getConfiguration());
        $this->serviceContainer->compile();

        return $this;
    }

    public function handleEvent(array $event)
    {
        print_r($event);
        $processor = $this->serviceContainer->get('ikwattro.github_event.event_processor_manager')->getProcessorForEvent($event['type']);

        return $processor->processEvent($event);
    }
}