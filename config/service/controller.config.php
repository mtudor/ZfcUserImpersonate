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
        'zfcuserimpersonate_adminController' => \ZfcUserImpersonate\Factory\Controller\AdminControllerFactory::class,
        'zfcuser' => \ZfcUserImpersonate\Factory\Controller\UserControllerFactory::class,
    )
);
