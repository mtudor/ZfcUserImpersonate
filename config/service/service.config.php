<?php
/**
 * ZfcUserImpersonate Service Config
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use Zend\Authentication\Storage\Session;

return array(
    'factories' => array(
        'zfcuserimpersonate_module_options' => \ZfcUserImpersonate\Factory\Service\ModuleOptionsFactory::class,
        'zfcuserimpersonate_user_service' => \ZfcUserImpersonate\Factory\Service\UserServiceFactory::class,
    ),
    'allow_override' => true,
    'aliases' => array(
        'zfcuser_user_service' => 'zfcuserimpersonate_user_service',
    ),
);
