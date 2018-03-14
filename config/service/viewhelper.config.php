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
        'zfcUserImpersonatorDisplayName' => \ZfcUserImpersonate\Factory\View\Helper\ZfcUserImpersonatorDisplayNameFactory::class,
        'zfcUserImpersonatorIdentity' => \ZfcUserImpersonate\Factory\View\Helper\ZfcUserImpersonatorIdentityFactory::class,
    ),
);
