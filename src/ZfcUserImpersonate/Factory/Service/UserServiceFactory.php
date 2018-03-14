<?php

namespace ZfcUserImpersonate\Factory\Service;

use Psr\Container\ContainerInterface;
use Zend\Authentication\Storage\Session;

class UserServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $userService = new \ZfcUserImpersonate\Service\User();
        $userService->setServiceManager($container);
        $userService->setStorageForImpersonator(new Session(get_class($userService), 'impersonator'));
        $userService->setStoreUserAsObject($container->get('zfcuserimpersonate_module_options')->getStoreUserAsObject());
        return $userService; }
}
