<?php
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'template_map' => include __DIR__  .'/../template_map.php',
    ),
    'controllers' => array(
        'invokables' => array(
            'goalioforgotpassword_forgot' => 'GoalioForgotPassword\Controller\ForgotController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'zfcuser' => array(
                'child_routes' => array(
                    'forgotpassword' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/forgot-password',
                            'defaults' => array(
                                'controller' => 'goalioforgotpassword_forgot',
                                'action'     => 'forgot',
                            ),
                        ),
                    ),
                    'resetpassword' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/reset-password/:userId/:token',
                            'defaults' => array(
                                'controller' => 'goalioforgotpassword_forgot',
                                'action'     => 'reset',
                            ),
                            'constraints' => array(
                                'userId'  => '[0-9]+',
                                'token' => '[A-F0-9]+',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
