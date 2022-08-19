<?php
/**
 * ZfcUserImpersonate Controller Config
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use Laminas\Mvc\Controller\ControllerManager;
use LmcUser\Controller\RedirectCallback;
use LmcUser\Controller\UserController;
use ZfcUserImpersonate\Controller;

return array(
    'factories' => array(
        'zfcuserimpersonate_adminController' => function ($cm) {
            $sm = $cm->getServiceLocator();

            $adminController = new Controller\Admin();
            $adminController->setConfig($sm->get('zfcuserimpersonate_module_options'));
            $adminController->setUserService($sm->get('zfcuserimpersonate_user_service'));

            return $adminController;
        },
        'zfcuser' => function($cm) {
            /* @var ControllerManager $cm*/
            $serviceManager = $cm->getServiceLocator();

            /* @var RedirectCallback $redirectCallback */
            $redirectCallback = $serviceManager->get('zfcuser_redirect_callback');

            /* @var UserController $controller */
            $controller = new Controller\User($redirectCallback);

            return $controller;
        },
    )
);
