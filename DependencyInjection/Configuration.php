<?php

namespace Avanzu\ProfileBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('avanzu_profile');

        $rootNode->children()
                ->scalarNode('user_class')->isRequired()->cannotBeEmpty()->end()
                ->arrayNode('registration')->children()
                    ->scalarNode('doubleoptin')->end()
                    ->end()
                ->end()
                ->arrayNode('form')->children()
                    ->arrayNode('class')->children()
                        ->scalarNode('user')->end()
                    ->end()
                ->end()
            ->end();
            

        return $treeBuilder;
    }
}
