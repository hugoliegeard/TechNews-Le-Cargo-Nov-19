<?php

namespace App\CompilerPass;


use App\Article\ArticleCatalogue;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RegisterArticleSourcePass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {

        /**
         * S'il n'y à pas de médiateur, on ne le charge pas...
         */
        if(!$container->hasDefinition(ArticleCatalogue::class)) {
            return;
        }

        $articleCatalogueDefinition = $container->getDefinition(ArticleCatalogue::class);
        $taggedServices = $container->findTaggedServiceIds('app.article_source');

        foreach ($taggedServices as $source => $tags) {
            $articleCatalogueDefinition->addMethodCall('addSource', [
               new Reference($source)
            ]);
        }

    }
}