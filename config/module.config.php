<?php
/**
 * ZfcUserImpersonate Module Config
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

return array(
    'controllers' => require('service/controller.config.php'),
    'service_manager' => require('service/service.config.php'),
    'view_helpers' => require('service/viewhelper.config.php'),
    'router' => array(
        'routes' => array(
            'zfcuserimpersonate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/user',
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'impersonate' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/impersonate/:userId',
                            'defaults' => array(
                                'controller' => 'zfcuserimpersonate_adminController',
                                'action'     => 'impersonateUser',
                            ),
                        ),
                    ),
                    'unimpersonate' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/unimpersonate',
                            'defaults' => array(
                                'controller' => 'zfcuserimpersonate_adminController',
                                'action'     => 'unimpersonateUser',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
