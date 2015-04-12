<?php
namespace User\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class SignupForm extends Form implements InputFilterProviderInterface 
{       
        public function __construct($dbAdapter)
	{   
            $this->dbAdapter = $dbAdapter;
            parent::__construct('createProfileForm');
		$this-> setAttribute('method','post');
		
		$this->add(array(
                'name' => 'donor_id',
                'attributes' => array(
                                'type'  => 'hidden',
                                ),
                ));
	
		$this-> add(array(
			'name' => 'userid',
                        'type' => 'Zend\Form\Element\Text',
			'attributes' => array(
				'type' => 'text',
                                'class' => 'required',
                                'minlength' => '6'
			),
			'options' => array(
				'label' => 'Desired Username',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
			),
		));
		
		$this-> add(array(
                        'name' => 'donor_first_name',
                        'type' => 'Zend\Form\Element\Text',
                        'attributes' => array(
                                'type' => 'text',
                        ),
                        'options' => array(
                                'label' => 'First Name',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                               
                        )
                ));

		$this->add(array(
                        'name' => 'donor_last_name',
                        'attributes' => array(
                                'type' => 'text'
                        ),
                        'options' => array(
                                'label' => 'Last Name',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        )
                ));

		$this->add(array(
                        'name' => 'email',
			'type' => 'Zend\Form\Element\Email',
                        'attributes' => array(
                                'placeholder' => 'you@domain.com'
                        ),
                        'options' => array(
                                'label' => 'Email',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        )
                ));

		$this->add(array(
                        'name' => 'password',
                        'type' => 'Zend\Form\Element\Password',
                        'attributes' => array(
                                'type' => 'password'
                        ),
                        'options' => array(
                                'label' => 'Password',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        )
                ));

			
		$this->add(array(
                        'name' => 'confirmPassword',
                        'type' => 'Zend\Form\Element\Password',
                        'attributes' => array(
                                'type' => 'password',
                                'id' => 'password'
                        ),
                        'options' => array(
                                'label' => 'Confirm Password',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        )
                ));
		
		$this->add(array(
                        'name' => 'date_of_birth',
			'type' => 'text',
                        'options' => array(
                                'label' => 'Date of Birth',
                        ),
                        'attributes' => array(
                                'id' => 'date_of_birth',
                                'style' => 'float: left;',
                                'class' => 'ten columns',
                                'readonly' => 'readonly'
                        ),
                ));

		$this->add(array(
                        'name' => 'gender',
                        'required' => false,
                        'type' => 'Zend\Form\Element\Radio',
                        'attributes' => array(
                            //'value' => "male"
                        ),
                        'options' => array(
                                'label' => 'Gender',
					'value_options' => array(
					'male' => 'Male',
					'female' => 'Female',
                                        '' => 'Prefer not to say'    
					),
                                'label_attributes' => array(
                                    'class' => 'left'
                                )
                               
                        )
                ));
                
                $this->add(array(
                        'name' => 'address1',
                        'attributes' => array(
                                'type' => 'text'
                        ),
                        'options' => array(
                                'label' => 'Address 1',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        )
                ));

		$this->add(array(
                        'name' => 'address2',
                        'attributes' => array(
                                'type' => 'text'
                        ),
                        'options' => array(
                                'label' => 'Address 2',
                        )
                ));

                $this->add(array(
                        'name' => 'country',
			'type' => 'Zend\Form\Element\Select',
                        'attributes' => array(
                                'value' => 'US',
                        ),
                        'options' => array(
                                'label' => 'Country'
                        ),
                        'attributes' => array(
                                'id' => 'country',
                                'class' => 'ten columns'
                        )
                ));
                
                $this->add(array(
                        'name' => 'donor_city',
                        'attributes' => array(
                                'type' => 'text'
                        ),
                        'options' => array(
                                'label' => 'City',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        )
                ));
                
                $this-> add(array(
			'name' => 'other_state',
			'attributes' => array(
				'type' => 'text',
                                'maxlength' => '10'
			),
                        'options' => array(
                                'label' => 'State',
                        ),
                        'attributes' => array(
                                'id' => 'other_state',
                                //'class' => 'six columns inline'
                        )
			));

		$this->add(array(
                        'name' => 'donor_state',
			'type' => 'Zend\Form\Element\Select',
                        'attributes' => array(
                                'value' => '1'
                        ),
                        'options' => array(
                                'label' => 'State',
                                'disable_inarray_validator' => true,
                            	'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        ),
                        'attributes' => array(
                                'id' => 'donor_state',
                                //'class' => 'six columns inline'
                        )
                ));
                
                $this->add(array(
                        'name' => 'zip',
                        'attributes' => array(
                                'type' => 'text',
                                'maxlength' => '5',
                                'id' => 'zip',
                        ),
                        'options' => array(
                                'label' => 'Zip',
                                'label_attributes' => array(
                                    'class' => 'requiredLabel'
                                )
                        )
                ));
                
                
                $this-> add(array(
                        'name' => 'phone1',
                        'attributes' => array(
                                'type' => 'text',
                        ),
                        'options' => array(
                                'label' => 'Primary Phone',
                               
                        )
                ));
        
                $this-> add(array(
                        'name' => 'phone2',
                        'attributes' => array(
                                'type' => 'text',
                        ),
                        'options' => array(
                                'label' => 'Phone 2',
                               
                        )
                ));
               
                
		$this-> add(array(
                        'name' => 'Continue',
                        'attributes' => array(
                                'type' => 'submit',
                                'class' => 'button continue-button'
                        ),
                        'options' => array(
                                'label' => 'Submit',
                        )
                ));
                
                

	}
        
        public function getInputFilterSpecification() {
            return array(
              'userid' => array(
                  'required' => true,
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  ),
                  'validators' => array(
                       array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'message' => 'Username Cannot be left blank'
                            )
                       ),
                       array(
                            'name' => 'DbNoRecordExists',
                            'options'=> array(
                                'table' => 'users',
                                'field' => 'userid',
                                'adapter' => $this->dbAdapter,
                                'message' => 'This username already exists'    
                            )
                       ),
                      
                  )
                  
              ),
              'donor_first_name' => array(
                  'required' => true,
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  ),
                  'validators' => array(
                       array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'message' => 'First Name Cannot be left blank'
                            )
                       ) 
                  )
                  
              ),  
              'donor_last_name' => array(
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  )
                  
              ),  
              'email' => array(
                  'required' => true,
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  ),
                  'validators' => array(
                       array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message' => 'email address is required'
                        )
                      ),
                      array(
                        'name' => 'EmailAddress', 
                        'options' => array(
                            'encoding' => 'UTF-8', 
                            'min'      => 5, 
                            'max'      => 255, 
                            'messages' => array( 
                                \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Email address format is invalid' 
                            )
                         )
                      ),
                      
                      
                  )
                  
              ), 
              'password' => array(
                  'required' => true,
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  ),
                  'validators' => array(
                       array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'message' => 'Password Cannot be left blank'
                            )
                       ),
                      array(
                          'name' => 'StringLength',
                          'options' => array(
                              'min' => '6',
                              'message' => 'Password should be atleast 6 characters long.'
                          )
                      )
                  )
                  
              ),
              'confirmPassword' => array(
                  'required' => true,
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  ),
                  'validators' => array(
                       array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'message' => 'Confirm Password Cannot be left blank'
                            ),
                       ),
                      array( 
                            'name' => 'identical', 
                            'options' => array(
                                'token' => 'password',
                                'message' => 'Confirm Password Should be same as Password field'
                          ) 
                      ),
                      array(
                          'name' => 'StringLength',
                          'options' => array(
                              'min' => '6',
                              'message' => 'Password should be atleast 6 characters long.'
                          )
                      )
                      
                  )
                  
              ),
                'country' => array(
                  'required' => false,
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  ),
                  'validators' => array(
                       array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'message' => 'Donor State Cannot be left blank'
                            )
                       ) 
                  )
                  
              ),
                'donor_state' => array(
                  'required' => false,
                  'filters' => array(
                      array('name' => 'StringTrim'),
                      array('name' => 'StripTags')
                  ),
                  'validators' => array(
                       array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'message' => 'Donor State Cannot be left blank'
                            )
                       ) 
                  )
                  
              ),  
//              'zip' => array(
//                  'required' => true,
//                  'filters' => array(
//                      array('name' => 'StringTrim'),
//                      array('name' => 'StripTags')
//                  ),
//                  'validators' => array(
//                      array(
//                            'name' => 'Digits',
//                            'options' => array(
//                                'message' => 'Zip should contains digits only'
//                            )
//                      ),
//                      array(
//                          'name' => 'StringLength',
//                          'options' => array(
//                              'min' => '5',
//                              //'max' => '5',
//                              'message' => 'Please enter a valid zipcode of 5 digits'
//                          )
//                      )
//                  )
//                  
//              )
                
            );
        }
        
}
