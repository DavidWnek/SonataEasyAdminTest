<?php

namespace Caxy\SonataEasyAdminBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class AdminBuilderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $config = $container->getParameter('sonata_easy_admin');

        $definitions = array();

        foreach ($config as $entities) {
            foreach ($entities as $name => $entity) {
                $class = $entity['class'];

                $definition = new Definition('Caxy\SonataEasyAdminBundle\Admin\AutoAdmin',
                    array(null, $class, null, $entity, $name));
                $definition->setPublic(true);
                $definition->addTag('sonata.admin', array('manager_type' => 'orm', 'label' => $name));

                $definitions['admin.'.$name] = $definition;
            }
        }

        $container->addDefinitions($definitions);
    }
}
