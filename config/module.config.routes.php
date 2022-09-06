<?php
/**
 * ZfcUserImpersonate Module Route Configuration
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

return [
    'router' => [
        'routes' => [
            'zfcuserimpersonate' => [
                'type' => Laminas\Router\Http\Literal::class,
                'options' => [
                    'route' => '/admin/user',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'impersonate' => [
                        'type' => Laminas\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/impersonate/:userId',
                            'defaults' => [
                                'controller' => 'zfcuserimpersonate_adminController',
                                'action'     => 'impersonateUser',
                            ],
                        ],
                    ],
                    'unimpersonate' => [
                        'type' => Laminas\Router\Http\Literal::class,
                        'options' => [
                            'route' => '/unimpersonate',
                            'defaults' => [
                                'controller' => 'zfcuserimpersonate_adminController',
                                'action'     => 'unimpersonateUser',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ]
];
