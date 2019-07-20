<?php

namespace ToDoApp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a single todo in the app.
 * @ORM\Entity
 * @ORM\Table(name="todo")
 */
class ToDo
{
    /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(name="id")   
   */
    public $id;

    /**
   * @ORM\Column(name="title")   
   */
    public $title;

    /**
   * @ORM\Column(name="completed")   
   */
    public $completed;

    /**
   * @ORM\Column(name="created")   
   */
    public $created;

    // Returns ID of this post.
    public function getId() 
    {
        return $this->id;
    }

    // Sets ID of this post.
    public function setId($id) 
    {
        $this->id = $id;
    }

    // Returns title.
    public function getTitle() 
    {
        return $this->title;
    }

    // Sets title.
    public function setTitle($title) 
    {
        $this->title = $title;
    }


    // Returns completed of this post.
    public function getCompleted() 
    {
        return $this->completed;
    }

    // Sets ID of this post.
    public function setCompleted($completed) 
    {
        $this->completed = $completed;
    }

    // Returns title.
    public function getCreated() 
    {
        return $this->created;
    }

    // Sets title.
    public function setCreated($created) 
    {
        $this->created = $created;
    }



}