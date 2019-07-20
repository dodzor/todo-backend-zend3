<?php

namespace ToDoApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ToDoApp\Entity\ToDo;
use ToDoApp\Form\ToDoForm;

class IndexController extends AbstractActionController
{

     /**
   * Entity manager.
   * @var Doctrine\ORM\EntityManager
   */
    private $entityManager;

    /**
     * ToDo manager
     * @var Todo\Service\ToDoManager
     */
    private $toDoManager;

    public function __construct($entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        // Get all todos
        $todos = $this->entityManager->getRepository(ToDo::class)->findAll();

        return new ViewModel([
            'todos' => $todos,
        ]);
    }
}