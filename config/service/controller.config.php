<?php
/**
 * ZfcUserImpersonate Controller Config
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use ZfcUserImpersonate\Controller\Admin as AdminController;

return array(
    'factories' => array(
        'zfcuserimpersonate_adminController' => function ($cm) {
            $sm = $cm->getServiceLocator();

            $adminController = new AdminController();
            $adminController->setConfig($sm->get('zfcuserimpersonate_module_options'));
            $adminController->setUserService($sm->get('zfcuserimpersonate_user_service'));

            return $adminController;
        },
    )
);
