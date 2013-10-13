<?php
/**
 * ZfcUserImpersonate Module Route Configuration
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

return array(
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
