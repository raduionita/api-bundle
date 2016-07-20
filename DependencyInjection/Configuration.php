<?php

namespace Raducorp\ApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('raducorp');

        /*
        raducorp:
            api:
                # api.site.com/soap/:action
                soap:
                    - { class: Namespace\Class }
                    - { service: @some.service }
                # api.site.com/rest/:resource
                rest:
                    - { resource: Namespace\Resource, methods: [GET, POST, PUT] }
                    - { resource: @some.service, methods: [GET, POST, PUT, DELETE, PATCH] }
        */

        return $treeBuilder;
    }
}
