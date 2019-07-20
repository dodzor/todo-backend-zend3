<?php

namespace ToDoApp\Service;

use ToDoApp\Entity\ToDo;
use Zend\Filter\StaticFilter;

class ToDoManager
{
    /**
   * Doctrine entity manager.
   * @var Doctrine\ORM\EntityManager
   */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addNewToDo($data)
    {
        $todo = new ToDo();
        
        $todo->setTitle($data['title']);
        $todo->setCompleted(0);
        $currentDate = date('Y-m-d H:i:s');
        $todo->setCreated($currentDate);

        // Add todo entity to entity manager 
        $this->entityManager->persist($todo);

        // Apply changes to db
        $this->entityManager->flush();
    }

    public function updateToDo($todo, $data) 
    {
        $todo->setTitle($data['title']);
        $todo->setCompleted($data['completed']);

        // Apply changes to db
        $this->entityManager->flush();
    }

    public function removeToDo($todo) 
    {
        $this->entityManager->remove($todo);
        
        $this->entityManager->flush();
    }

}