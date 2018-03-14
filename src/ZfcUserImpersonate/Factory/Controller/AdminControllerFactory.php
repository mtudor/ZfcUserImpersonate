<?php

namespace ZfcUserImpersonate\Factory\Controller;

use Psr\Container\ContainerInterface;

class AdminControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $adminController = new \ZfcUserImpersonate\Controller\Admin();
        $adminController->setConfig($container->get('zfcuserimpersonate_module_options'));
        $adminController->setUserService($container->get('zfcuserimpersonate_user_service'));

        return $adminController;
    }
}
