<?php

declare(strict_types=1);

namespace Mpp\ReferentialBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const CONFIGURATION_ROOT = 'mpp_referential';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIGURATION_ROOT);

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('data')
                    ->prototype('array')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('slug')->isRequired()->end()
                                ->scalarNode('label')->isRequired()->end()
                                ->variableNode('meta')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}