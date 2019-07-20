<?php

namespace ToDoApp\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use ToDoApp\Entity\ToDo;

class ToDoForm extends Form
{
    public function __construct()
    {
        parent::__construct('to-do-form');

        $this->setAttribute('method', 'post');
        $this->addElements();
        $this->addInputFilters();
    }

    private function addElements()
    {
        // Add "title" field
        $this->add([           
            'type'  => 'text',
            'name' => 'title',
            'attributes' => [
                'id' => 'title'
            ],
            'options' => [
                'label' => 'Title',
            ],
        ]);

        // Add "completed" field
        $this->add(array(
            // 'type' => 'Zend\Form\Element\Checkbox',
            'type' => 'checkbox',
            'name' => 'completed',
            'attributes' => [
                'id' => 'completed',
            ],
            'options' => array(
                'label' => 'Completed',
                // 'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));

        // Add the submit button
        $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [                
                'value' => 'Add',
                'id' => 'submitbutton',
            ],
        ]);

    }

    private function addInputFilters()
    {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
            'name'     => 'title',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],                
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 1024
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name'     => 'completed',
            'required' => true,            
            'validators' => [
                [
                    'name' => 'Digits',
                    // 'break_chain_on_failure' => true,
                    // 'options' => [
                    //     'messages' => [
                    //         // Digits::NOT_DIGITS => 'You must agree to the terms of use.',
                    //     ],
                    // ],
                ],
            ],
        ]);
    }
    
}