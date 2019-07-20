<?php

namespace ToDoApp;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;


return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'todo' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/todo[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ToDoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
'controllers' => [
    'factories' => [
        // Controller\ToDoController::class => InvokableFactory::class,
        Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
        Controller\ToDoController::class => Controller\Factory\ToDoControllerFactory::class,
    ],
],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\ToDoManager::class => Service\Factory\ToDoManagerFactory::class,
        ],
    ],

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]  
];