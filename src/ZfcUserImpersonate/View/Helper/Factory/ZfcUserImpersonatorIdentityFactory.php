<?php

declare(strict_types=1);

namespace ZfcUserImpersonate\View\Helper\Factory;

use ZfcUserImpersonate\View\Helper\ZfcUserImpersonatorIdentity;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Class ZfcUserImpersonatorIdentityFactory
 */
final class ZfcUserImpersonatorIdentityFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ZfcUserImpersonatorIdentity
    {
        $viewHelper = new ZfcUserImpersonatorIdentity();
        $viewHelper->setUserService($container->get('zfcuserimpersonate_user_service'));
        return $viewHelper;
    }
}
