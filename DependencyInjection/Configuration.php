<?php
namespace Kna\MQTransactionBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $root = $treeBuilder->root('kna_mq_transaction');

        $root
            ->children()
                ->scalarNode('default_producer')
                    ->defaultNull()
                ->end()
                ->booleanNode('enable_logger')
                    ->defaultFalse()
                ->end()
                ->arrayNode('message')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')
                            ->defaultNull()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}