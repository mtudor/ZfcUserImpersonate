<?php

namespace ZfcUserImpersonate\Factory\View\Helper;

use Psr\Container\ContainerInterface;

class ZfcUserImpersonatorDisplayNameFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $viewHelper = new \ZfcUserImpersonate\View\Helper\ZfcUserImpersonatorDisplayName();
        $viewHelper->setUserService($container->get('zfcuserimpersonate_user_service'));
        return $viewHelper;
    }
}
