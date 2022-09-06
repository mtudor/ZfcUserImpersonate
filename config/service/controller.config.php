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
        'zfcuserimpersonate_adminController' => Controller\Factory\AdminFactory::class,
        'zfcuser' => Controller\Factory\UserFactory::class,
    )
);
