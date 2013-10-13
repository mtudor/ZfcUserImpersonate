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
        'zfcUserImpersonatorDisplayName' => function ($hm) {
            $viewHelper = new ZfcUserImpersonatorDisplayName();
            $viewHelper->setUserService($hm->getServiceLocator()->get('zfcuserimpersonate_user_service'));
            return $viewHelper;
        },
        'zfcUserImpersonatorIdentity' => function ($hm) {
            $viewHelper = new ZfcUserImpersonatorIdentity();
            $viewHelper->setUserService($hm->getServiceLocator()->get('zfcuserimpersonate_user_service'));
            return $viewHelper;
        },
    ),
);
