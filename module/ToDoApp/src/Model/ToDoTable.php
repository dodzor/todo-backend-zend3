<?php

namespace ToDoApp\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ToDoTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getToDo($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveToDo(ToDo $ToDo)
    {
        $data = [
            'artist' => $ToDo->artist,
            'title'  => $ToDo->title,
        ];

        $id = (int) $ToDo->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getToDo($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update ToDo with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteToDo($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}