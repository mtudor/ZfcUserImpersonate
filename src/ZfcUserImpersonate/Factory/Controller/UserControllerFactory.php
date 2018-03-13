<?php

namespace ZfcUserImpersonate\Factory\Controller;

use Psr\Container\ContainerInterface;

class UserControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $redirectCallback = $container->get('zfcuser_redirect_callback');
        $controller = new \ZfcUserImpersonate\Controller\User($redirectCallback);
        return $controller;
    }
}
