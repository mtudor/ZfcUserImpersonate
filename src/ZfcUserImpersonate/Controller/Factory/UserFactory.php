<?php

declare(strict_types=1);

namespace ZfcUserImpersonate\Controller\Factory;

use ZfcUserImpersonate\Controller\User;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Class UserFactory
 */
final class UserFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): User
    {
        return new User($container->get('zfcuser_redirect_callback'));
    }
}
