<?php
/**
 * ZfcUserImpersonate Controller Config
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use ZfcUserImpersonate\Controller;

return array(
    'factories' => array(
        'zfcuserimpersonate_adminController' => function ($sm) {
            $adminController = new Controller\Admin();
            $adminController->setConfig($sm->get('zfcuserimpersonate_module_options'));
            $adminController->setUserService($sm->get('zfcuserimpersonate_user_service'));

            return $adminController;
        },
        'zfcuser' => function($serviceManager) {
            /* @var RedirectCallback $redirectCallback */
            $redirectCallback = $serviceManager->get('zfcuser_redirect_callback');

            /* @var UserController $controller */
            $controller = new Controller\User($redirectCallback);

            return $controller;
        },
    )
);
