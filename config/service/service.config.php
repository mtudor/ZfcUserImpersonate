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
        'zfcuserimpersonate_user_service' => function ($sm) {
            $userService = new UserService();
            $userService->setStorageForImpersonator(new Session(get_class($userService), 'impersonator'));
            return $userService;
        }
    ),
);
