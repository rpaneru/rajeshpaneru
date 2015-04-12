<?php
namespace Users\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class SignupForm extends Form implements InputFilterProviderInterface 
{       
        public function __construct($dbAdapter)
	{   
            $this->dbAdapter = $dbAdapter;
            parent::__construct('signupForm');
            
		$this-> setAttribute('method','post');

		$this-> add(array(
			'name' => 'email',
                        'type' => 'Zend\Form\Element\Text',
			'attributes' => array(
				'type' => 'email',
                                'class' => 'form-control'
			),
			'options' => array(
				'label' => 'Email',
                                'label_attributes' => array(
                                    'class' => 'pull-right'
                                )
			),
		));
		
               
                
		$this-> add(array(
                        'name' => 'Submit',
                        'attributes' => array(
                                'type' => 'submit',
                                'class' => 'btn btn-primary'
                        ),
                        'options' => array(
                                'label' => '',
                        )
                ));
                
                

	}
        
        public function getInputFilterSpecification() {
            return array(
            );
        }
        
}
