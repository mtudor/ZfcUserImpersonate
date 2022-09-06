<?php

declare(strict_types=1);

namespace ZfcUserImpersonate\Options\Factory;

use ZfcUserImpersonate\Options\ModuleOptions;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Class ModuleOptionsFactory
 */
final class ModuleOptionsFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ModuleOptions
    {
        $config = $container->get('Config');
        $options = isset($config['zfcuserimpersonate']) ? $config['zfcuserimpersonate'] : array();
        return new ModuleOptions($options);
    }
}
