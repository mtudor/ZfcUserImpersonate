<?php

declare(strict_types=1);

namespace ZfcUserImpersonate\View\Helper\Factory;

use ZfcUserImpersonate\View\Helper\ZfcUserImpersonatorDisplayName;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Class ZfcUserImpersonatorDisplayNameFactory
 */
final class ZfcUserImpersonatorDisplayNameFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ZfcUserImpersonatorDisplayName
    {
        $viewHelper = new ZfcUserImpersonatorDisplayName();
        $viewHelper->setUserService($container->get('zfcuserimpersonate_user_service'));
        return $viewHelper;
    }
}
