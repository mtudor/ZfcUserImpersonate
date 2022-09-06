<?php

declare(strict_types=1);

namespace ZfcUserImpersonate\Service\Factory;

use Laminas\Authentication\Storage\Session;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use ZfcUserImpersonate\Service\User as UserService;

/**
 * Class UserFactory
 */
final class UserFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): UserService
    {
        $userService = new UserService();
        $userService->setServiceManager($container);
        $userService->setStorageForImpersonator(new Session(get_class($userService), 'impersonator'));
        $userService->setStoreUserAsObject($container->get('zfcuserimpersonate_module_options')->getStoreUserAsObject());
        return $userService;
    }
}
