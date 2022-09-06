<?php
/**
 * ZfcUserImpersonate Service Config
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

return array(
    'factories' => array(
        'zfcuserimpersonate_module_options' => \ZfcUserImpersonate\Options\Factory\ModuleOptionsFactory::class,
        'zfcuserimpersonate_user_service' => \ZfcUserImpersonate\Service\Factory\UserFactory::class
    ),
);
