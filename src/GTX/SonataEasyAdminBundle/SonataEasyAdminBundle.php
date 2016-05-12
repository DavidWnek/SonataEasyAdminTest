<?php

namespace GTX\SonataEasyAdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use GTX\SonataEasyAdminBundle\DependencyInjection\AdminBuilderPass;

class SonataEasyAdminBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AdminBuilderPass());
    }
}
