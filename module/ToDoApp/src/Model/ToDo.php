<?php

namespace ToDoApp\Model;

class ToDo
{
    public $id;
    public $title;
    public $completed;
    public $created;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
        $this->completed  = !empty($data['completed']) ? $data['completed'] : null;
        $this->created  = !empty($data['created']) ? $data['created'] : null;
    }


}