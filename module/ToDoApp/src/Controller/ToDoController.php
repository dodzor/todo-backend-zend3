<?php

namespace ToDoApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ToDoApp\Entity\ToDo;
use ToDoApp\Form\ToDoForm;

class ToDoController extends AbstractActionController
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

    public function __construct($entityManager, $toDoManager) 
    {
        $this->entityManager = $entityManager;
        $this->toDoManager = $toDoManager;
    }

    public function addAction()
    {
        $form = new ToDoForm();

        // Check if request is post request
        if ($this->getRequest()->isPost()) {

            // Get POST data
            $data = $this->params()->fromPost();

            // Fill form with data
            $form->setData($data);

            if ($form->isValid()) {
                // Get validated data
                $data = $form->getData();
                
                // Add new todo to database
                $this->toDoManager->addNewToDo($data);

                // Redirect the user to index page
                $this->redirect()->toUrl('/');
            }
        }

        return new ViewModel([
            'form' => $form
        ]);
    }

    public function editAction() 
    {
        $form = new ToDoForm();

        $toDoId = $this->params()->fromRoute('id', -1);
        
        // Find existing todo in the db
        $toDo = $this->entityManager->getRepository(ToDo::class)->findOneById($toDoId);
        if ($toDo == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        // Check if request is POST request
        if ($this->getRequest()->isPost()) {

            // Get POST data
            $data = $this->params()->fromPost();
            
            // Fill form with data
            $form->setData($data);

            // Validate form data
            if ($form->isValid()) {

                // Get validated data
                $data = $form->getData();

                // Update database with new todo data
                $this->toDoManager->updateToDo($toDo, $data);

                // Redirect to index page
                $this->redirect()->toUrl('/');
            }
        }
        else {
            $data = [
                'title' => $toDo->getTitle(),
                'completed' => $toDo->getCompleted()
            ];

            $form->setData($data);
        }

        return new ViewModel([
            'form' => $form,
            'toDo' => $toDo
        ]);
    }

    public function deleteAction()
    {
        $toDoId = $this->params()->fromRoute('id', -1);

        $toDo = $this->entityManager->getRepository(ToDo::class)->findOneById($toDoId);
        if ($toDo == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $this->toDoManager->removeToDo($toDo);

        $this->redirect()->toUrl('/');
    }
}