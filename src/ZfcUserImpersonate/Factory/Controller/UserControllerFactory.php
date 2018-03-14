<?php

namespace ZfcUserImpersonate\Factory\Controller;

use Psr\Container\ContainerInterface;

class UserControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $redirectCallback = $container->get('zfcuser_redirect_callback');
        $controller = new \ZfcUserImpersonate\Controller\User($redirectCallback);
        $controller->setServiceLocator($container);

        $controller->setChangeEmailForm($container->get('zfcuser_change_email_form'));
        $controller->setOptions($container->get('zfcuser_module_options'));
        $controller->setChangePasswordForm($container->get('zfcuser_change_password_form'));
        $controller->setLoginForm($container->get('zfcuser_login_form'));
        $controller->setRegisterForm($container->get('zfcuser_register_form'));
        $controller->setUserService($container->get('zfcuser_user_service'));

        return $controller;
    }
}
