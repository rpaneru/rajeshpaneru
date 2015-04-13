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

		
                $this->add(array(
                    'name' => 'name',
                    'type' => 'Text',
                    'attributes' => array(                                                            
                                    'id' => 'name',
                                    'class' => 'form-control',
                                    'required' => 'true'
                                ),
                    'options' => array(
                                    'label' => 'Name'
                                )
                ));
            
        $this->add(array(
           'name' => 'dob',
           'type' => 'Text',
           'attributes' => array(
               'type' => 'text',
               'required' => 'true',
               'id' => 'dob',

           ),
            'options' => array(
                   'label' => 'DOB',
          )
       ));
                
            $this->add(array(
                'name' => 'gender',
                'type' => 'Radio',
                'attributes' => array(
                    'required' => 'true',
                    'value' => 'Male'
                ),
                'options' => array(
                    'label' => 'Gender',
                    'label_attributes' => array(
                        'class' => ''
                    ),

                    'value_options' => array(
                        'Male' => 'Male',
                        'Female' => 'Female'
                    )
                )
            ));
       
                $this->add(array(
                    'name' => 'user_image',
                    'type' => 'file',
                    'attributes' => array(
                        'id' => 'user_image',
                        'class' => 'form-control'
                    ),
                     'options' => array(
                            'label' => 'Profile Picture',
                   )
                ));      

                
                
                $this->add(array(                           
           'name' => 'state',
           'type' => 'Select',
           'attributes' => array(
                    'required' => 'true',
                    'id' => 'state',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'State',
                    'empty_option' => 'Choose:',
                )
       ));
                
                

            
            

            
            
           $this->add(array(                           
           'name' => 'userTypeId',
           'type' => 'Select',
           'attributes' => array(
                    'required' => 'true',
                    'id' => 'userTypeId',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'User Type',
                    'empty_option' => 'Choose:',
                )
       ));


                       $this->add(array(
                'name' => 'status',
                'type' => 'Radio',
                'attributes' => array(
                    'required' => 'true',
                    'value' => '1'
                ),
                'options' => array(
                    'label' => 'Status',
                    'label_attributes' => array(
                        'class' => ''
                    ),

                    'value_options' => array(
                        '1' => 'Active',
                        '2' => 'Inactive'
                    )
                )
            ));
           
           


	$this->add(array(
            'name' => 'address',
            'type' => 'text',
           'attributes' => array(             
               'id' => 'address',
               'class' => 'form-control',
               'placeholder' => 'Address'
            ),
            'options' => array(
                'label' => 'Address',
            )
       ));
        
        
       $this->add(array(
           'name' => 'city',
           'type' => 'text',
           'attributes' => array(               
               'id' => 'city',
               'class' => 'form-control',
               'placeholder' => 'City'
           ),
            'options' => array(
                   'label' => 'City',
          )
       )); 
       
                   $this->add(array(
                    'name' => 'district',
                    'type' => 'Text',
                    'attributes' => array(                                                            
                                    'id' => 'district',
                                    'class' => 'form-control',
                                    'required' => 'true'
                                ),
                    'options' => array(
                                    'label' => 'District'
                                )
                ));
       
           $this->add(array(                           
           'name' => 'state',
           'type' => 'Select',
           'attributes' => array(
                    'required' => 'true',
                    'id' => 'state',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'State',
                    'empty_option' => 'Choose:',
                )
       ));
           
           $this->add(array(                           
           'name' => 'country',
           'type' => 'Select',
           'attributes' => array(
                    'required' => 'true',
                    'id' => 'country',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Country',
                    'empty_option' => 'Choose:',
                )
       ));
       
        $this->add(array(
            'name' => 'zip',
            'type' => 'text',
            'attributes' => array(               
               'id' => 'zip',
               'class' => 'form-control',                
               'placeholder' => 'Zip'
           ),
            'options' => array(
                   'label' => 'Zip',
          )
       )); 
               
           
        $this->add(array(
           'name' => 'term',           
            'type' => 'Checkbox',
           'attributes' => array(
               'type' => 'Checkbox',
               'id' => 'term'
           ),
            'options' => array(
                   'label' => 'Accept Term',
          )
       ));
                

	}
        
        public function getInputFilterSpecification() {
            return array(
            );
        }
        
}
