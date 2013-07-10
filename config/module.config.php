<?php
/**
 * ZfcUserImpersonate Module Config
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'zfcuser' => 'ZfcUserImpersonate\Controller\User',
        ),
    ),
    'service_manager' => array(
        'allow_override' => true,
        'aliases' => array(
            //'zfcuserimpersonate_user_service' => 'zfcuser_user_service',
            'zfcuser_user_service' => 'zfcuserimpersonate_user_service',
        ),
    ),
);
