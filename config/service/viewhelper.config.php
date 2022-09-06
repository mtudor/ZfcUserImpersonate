<?php
/**
 * ZfcUserImpersonate View Helper Config
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

return array(
    'factories' => array(
        'zfcUserImpersonatorDisplayName' => \ZfcUserImpersonate\View\Helper\Factory\ZfcUserImpersonatorDisplayNameFactory::class,
        'zfcUserImpersonatorIdentity' => \ZfcUserImpersonate\View\Helper\Factory\ZfcUserImpersonatorIdentityFactory::class,
    ),
);
