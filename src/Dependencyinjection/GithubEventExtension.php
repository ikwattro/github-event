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

namespace Ikwattro\GithubEvent\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader\YamlFileLoader,
    Symfony\Component\DependencyInjection\Extension\ExtensionInterface,
    Symfony\Component\DependencyInjection\Definition,
    Symfony\Component\Config\Definition\Processor,
    Symfony\Component\Config\FileLocator;

class GithubEventExtension implements ExtensionInterface
{
    protected $container;

    public function load(array $configs, ContainerBuilder $container)
    {
        $this->container = $container;
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.yml');

    }

    public function getAlias()
    {
        return 'github_event';
    }

    public function getXsdValidationBasePath()
    {
        return false;
    }

    public function getNamespace()
    {
        return false;
    }
}