<?php

declare(strict_types=1);

namespace ZfcUserImpersonate\Controller\Factory;

use ZfcUserImpersonate\Controller\Admin;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Class AdminFactory
 */
final class AdminFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): Admin
    {

        $adminController = new Admin();
        $adminController->setConfig($container->get('zfcuserimpersonate_module_options'));
        $adminController->setUserService($container->get('zfcuserimpersonate_user_service'));

        return $adminController;
    }
}
