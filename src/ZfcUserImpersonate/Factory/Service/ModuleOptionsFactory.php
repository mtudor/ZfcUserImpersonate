<?php

namespace ZfcUserImpersonate\Factory\Service;

use Psr\Container\ContainerInterface;

class ModuleOptionsFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('Config');
        return new \ZfcUserImpersonate\Options\ModuleOptions(isset($config['zfcuserimpersonate']) ? $config['zfcuserimpersonate'] : array());
    }
}
