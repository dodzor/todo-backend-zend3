<?php
namespace ToDoApp\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use ToDoApp\Service\ToDoManager;
use ToDoApp\Controller\ToDoController;

/**
 * This is the factory for ToDoController. Its purpose is to instantiate the
 * controller.
 */
class ToDoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, 
                     $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $postManager = $container->get(ToDoManager::class);
        
        // Instantiate the controller and inject dependencies
        return new ToDoController($entityManager, $postManager);
    }
}