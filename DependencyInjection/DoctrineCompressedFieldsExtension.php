<?php

namespace KonstantinKuklin\DoctrineCompressedFieldsBundle\DependencyInjection;

use KonstantinKuklin\DoctrineCompressedFields\EventListener\LoadClassMetadataListener;
use KonstantinKuklin\DoctrineCompressedFields\EventListener\LoadFlushListener;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * DoctrineCompressedFieldsExtension
 *
 * @author Konstantin Kuklin <konstantin.kuklin@gmail.com>
 */
class DoctrineCompressedFieldsExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $definitionLoadClassMetadataListener = new Definition(LoadClassMetadataListener::class);
        $definitionLoadClassMetadataListener->setTags(['name' => 'doctrine.event_subscriber']);

        $definitionLoadFlushListener = new Definition(LoadFlushListener::class);
        $definitionLoadFlushListener->setTags(['name' => 'doctrine.event_subscriber']);

        $container->addDefinitions([$definitionLoadClassMetadataListener, $definitionLoadFlushListener]);
    }
}
