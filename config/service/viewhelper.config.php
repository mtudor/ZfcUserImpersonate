<?php
/**
 * ZfcUserImpersonate View Helper Config
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use ZfcUserImpersonate\View\Helper\ZfcUserImpersonatorDisplayName;
use ZfcUserImpersonate\View\Helper\ZfcUserImpersonatorIdentity;

return array(
    'factories' => array(
        'zfcUserImpersonatorDisplayName' => function ($sm) {
            $viewHelper = new ZfcUserImpersonatorDisplayName();
            $viewHelper->setUserService($sm->get('zfcuserimpersonate_user_service'));
            return $viewHelper;
        },
        'zfcUserImpersonatorIdentity' => function ($sm) {
            $viewHelper = new ZfcUserImpersonatorIdentity();
            $viewHelper->setUserService($sm->get('zfcuserimpersonate_user_service'));
            return $viewHelper;
        },
    ),
);
