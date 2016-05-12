<?php

namespace Caxy\SonataEasyAdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Caxy\SonataEasyAdminBundle\DependencyInjection\AdminBuilderPass;

class SonataEasyAdminBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AdminBuilderPass());
    }
}
