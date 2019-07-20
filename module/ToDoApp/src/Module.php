<?php

namespace ToDoApp;

// use Zend\Db\Adapter\AdapterInterface;
// use Zend\Db\ResultSet\ResultSet;
// use Zend\Db\TableGateway\TableGateway;

use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    // public function getServiceConfig()
    // {
    //     return [
    //         'factories' => [
    //             Model\ToDoTable::class => function($container) {
    //                 $tableGateway = $container->get(Model\ToDoTableGateway::class);
    //                 return new Model\ToDoTable($tableGateway);
    //             },
    //             Model\ToDoTableGateway::class => function ($container) {
    //                 $dbAdapter = $container->get(AdapterInterface::class);
    //                 $resultSetPrototype = new ResultSet();
    //                 $resultSetPrototype->setArrayObjectPrototype(new Model\ToDo());
    //                 return new TableGateway('todo', $dbAdapter, null, $resultSetPrototype);
    //             },
    //         ],
    //     ];
    // }

    // public function getControllerConfig()
    // {
    //     return [
    //         'factories' => [
    //             Controller\ToDoController::class => function($container) {
    //                 return new Controller\ToDoController(
    //                     $container->get(Model\ToDoTable::class)
    //                 );
    //             },
    //         ],
    //     ];
    // }

}
