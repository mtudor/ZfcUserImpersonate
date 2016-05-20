<?php
/**
 * ZfcUserImpersonate Service Config
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use Zend\Authentication\Storage\Session;
use ZfcUserImpersonate\Options\ModuleOptions;
use ZfcUserImpersonate\Service\User as UserService;

return array(
    'factories' => array(
        'zfcuserimpersonate_module_options' => function ($sm) {
            $config = $sm->get('Config');
            return new ModuleOptions(isset($config['zfcuserimpersonate']) ? $config['zfcuserimpersonate'] : array());
        },
        'zfcuserimpersonate_user_service' => function ($sm) {
            $userService = new UserService();
            $userService->setServiceManager($sm);
            $userService->setStorageForImpersonator(new Session(get_class($userService), 'impersonator'));
            $userService->setStoreUserAsObject($sm->get('zfcuserimpersonate_module_options')->getStoreUserAsObject());
            return $userService;
        }
    ),
);
